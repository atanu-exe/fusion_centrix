<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailCampaign;
use App\Models\EmailLog;
use App\Models\EmailTemplate;
use App\Models\Lead;
use App\Models\LeadStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailCampaignController extends Controller
{
    public function index(Request $request)
    {
        $query = EmailCampaign::with('creator');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $campaigns = $query->orderBy('created_at', 'desc')->paginate(15);

        $stats = [
            'total' => EmailCampaign::count(),
            'sent' => EmailCampaign::where('status', 'sent')->count(),
            'draft' => EmailCampaign::where('status', 'draft')->count(),
            'total_sent' => EmailLog::where('status', '!=', 'pending')->count(),
        ];

        return view('admin.email.campaigns.index', compact('campaigns', 'stats'));
    }

    public function create()
    {
        $templates = EmailTemplate::where('is_active', true)->get();
        $statuses = LeadStatus::where('is_active', true)->get();

        return view('admin.email.campaigns.create', compact('templates', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'template_id' => 'nullable|exists:email_templates,id',
            'recipient_filter' => 'nullable|array',
        ]);

        $campaign = EmailCampaign::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'content' => $request->content,
            'template_id' => $request->template_id,
            'recipient_filter' => $request->recipient_filter,
            'status' => 'draft',
            'created_by' => auth()->id(),
        ]);

        // Calculate recipients
        $recipientCount = $this->getRecipientQuery($request->recipient_filter)->count();
        $campaign->update(['total_recipients' => $recipientCount]);

        return redirect()->route('admin.email.campaigns.show', $campaign)
            ->with('success', 'Campaign created successfully.');
    }

    public function show(EmailCampaign $campaign)
    {
        $campaign->load(['creator', 'emails' => function ($q) {
            $q->latest()->take(50);
        }]);

        return view('admin.email.campaigns.show', compact('campaign'));
    }

    public function edit(EmailCampaign $campaign)
    {
        if ($campaign->status === 'sent') {
            return back()->with('error', 'Cannot edit a sent campaign.');
        }

        $templates = EmailTemplate::where('is_active', true)->get();
        $statuses = LeadStatus::where('is_active', true)->get();

        return view('admin.email.campaigns.edit', compact('campaign', 'templates', 'statuses'));
    }

    public function update(Request $request, EmailCampaign $campaign)
    {
        if ($campaign->status === 'sent') {
            return back()->with('error', 'Cannot edit a sent campaign.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $campaign->update($request->only(['name', 'subject', 'content', 'template_id', 'recipient_filter']));

        // Recalculate recipients
        $recipientCount = $this->getRecipientQuery($campaign->recipient_filter)->count();
        $campaign->update(['total_recipients' => $recipientCount]);

        return redirect()->route('admin.email.campaigns.show', $campaign)
            ->with('success', 'Campaign updated.');
    }

    public function send(EmailCampaign $campaign)
    {
        if ($campaign->status !== 'draft') {
            return back()->with('error', 'Campaign cannot be sent.');
        }

        $leads = $this->getRecipientQuery($campaign->recipient_filter)->get();

        if ($leads->isEmpty()) {
            return back()->with('error', 'No recipients found for this campaign.');
        }

        $campaign->update(['status' => 'sending']);

        $sentCount = 0;
        foreach ($leads as $lead) {
            if (!$lead->email) continue;

            try {
                // Parse template variables
                $subject = $this->parseVariables($campaign->subject, $lead);
                $body = $this->parseVariables($campaign->content, $lead);

                // Create email log
                $emailLog = EmailLog::create([
                    'campaign_id' => $campaign->id,
                    'lead_id' => $lead->id,
                    'to_email' => $lead->email,
                    'to_name' => $lead->name,
                    'subject' => $subject,
                    'body' => $body,
                    'status' => 'pending',
                ]);

                // Send email (using Laravel Mail)
                Mail::send([], [], function ($message) use ($lead, $subject, $body) {
                    $message->to($lead->email, $lead->name)
                        ->subject($subject)
                        ->html($body);
                });

                $emailLog->update([
                    'status' => 'sent',
                    'sent_at' => now(),
                ]);

                $sentCount++;

            } catch (\Exception $e) {
                EmailLog::where('id', $emailLog->id ?? 0)->update([
                    'status' => 'failed',
                    'error_message' => $e->getMessage(),
                ]);
            }
        }

        $campaign->update([
            'status' => 'sent',
            'sent_count' => $sentCount,
            'sent_at' => now(),
        ]);

        return back()->with('success', "Campaign sent to {$sentCount} recipients.");
    }

    public function schedule(Request $request, EmailCampaign $campaign)
    {
        $request->validate([
            'scheduled_at' => 'required|date|after:now',
        ]);

        $campaign->update([
            'status' => 'scheduled',
            'scheduled_at' => $request->scheduled_at,
        ]);

        return back()->with('success', 'Campaign scheduled successfully.');
    }

    public function destroy(EmailCampaign $campaign)
    {
        $campaign->emails()->delete();
        $campaign->delete();

        return redirect()->route('admin.email.campaigns.index')
            ->with('success', 'Campaign deleted.');
    }

    protected function getRecipientQuery(?array $filter)
    {
        $query = Lead::whereNotNull('email');

        if (!empty($filter)) {
            if (!empty($filter['status_ids'])) {
                $query->whereIn('lead_status_id', $filter['status_ids']);
            }
            if (!empty($filter['source_ids'])) {
                $query->whereIn('lead_source_id', $filter['source_ids']);
            }
            if (!empty($filter['assigned_to'])) {
                $query->where('assigned_to', $filter['assigned_to']);
            }
        }

        return $query;
    }

    protected function parseVariables(string $content, Lead $lead): string
    {
        $variables = [
            '{{name}}' => $lead->name,
            '{{first_name}}' => explode(' ', $lead->name)[0],
            '{{email}}' => $lead->email,
            '{{company}}' => $lead->company ?? '',
            '{{phone}}' => $lead->phone ?? '',
            '{{city}}' => $lead->city ?? '',
        ];

        return str_replace(array_keys($variables), array_values($variables), $content);
    }

    // Email Templates
    public function templates()
    {
        $templates = EmailTemplate::with('creator')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.email.templates.index', compact('templates'));
    }

    public function createTemplate()
    {
        return view('admin.email.templates.create');
    }

    public function storeTemplate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'nullable|string|max:50',
        ]);

        EmailTemplate::create([
            ...$request->only(['name', 'subject', 'body', 'category']),
            'variables' => ['name', 'first_name', 'email', 'company', 'phone', 'city'],
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('admin.email.templates')
            ->with('success', 'Template created successfully.');
    }

    public function editTemplate(EmailTemplate $template)
    {
        return view('admin.email.templates.edit', compact('template'));
    }

    public function updateTemplate(Request $request, EmailTemplate $template)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'nullable|string|max:50',
            'is_active' => 'boolean',
        ]);

        $template->update([
            ...$request->only(['name', 'subject', 'body', 'category']),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.email.templates')
            ->with('success', 'Template updated successfully.');
    }

    public function destroyTemplate(EmailTemplate $template)
    {
        $template->delete();
        return back()->with('success', 'Template deleted.');
    }
}
