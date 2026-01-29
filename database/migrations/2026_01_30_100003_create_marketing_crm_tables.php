<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Lead sources
        Schema::create('lead_sources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color')->default('#6366f1');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Lead statuses
        Schema::create('lead_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color')->default('#6366f1');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Leads
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('alternate_phone', 50)->nullable();
            $table->string('company')->nullable();
            $table->string('designation')->nullable();
            $table->string('website')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->foreignId('lead_source_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('lead_status_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->decimal('estimated_value', 15, 2)->nullable();
            $table->date('expected_close_date')->nullable();
            $table->text('description')->nullable();
            $table->json('custom_fields')->nullable();
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->string('import_batch')->nullable(); // For tracking Excel imports
            $table->timestamp('last_contact_at')->nullable();
            $table->timestamp('converted_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('email');
            $table->index('phone');
            $table->index('assigned_to');
            $table->index('lead_status_id');
        });

        // Lead followups
        Schema::create('lead_followups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['call', 'email', 'meeting', 'whatsapp', 'sms', 'other'])->default('call');
            $table->text('notes');
            $table->enum('outcome', ['connected', 'not_answered', 'busy', 'callback', 'interested', 'not_interested', 'meeting_scheduled', 'other'])->nullable();
            $table->datetime('followup_date')->nullable(); // Next followup
            $table->datetime('reminder_at')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->timestamps();

            $table->index(['lead_id', 'created_at']);
        });

        // Lead imports log
        Schema::create('lead_imports', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('batch_id')->unique();
            $table->integer('total_rows')->default(0);
            $table->integer('imported_rows')->default(0);
            $table->integer('failed_rows')->default(0);
            $table->integer('duplicate_rows')->default(0);
            $table->json('column_mapping')->nullable();
            $table->json('errors')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'failed'])->default('pending');
            $table->foreignId('imported_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        // Email templates
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subject');
            $table->text('body');
            $table->string('category')->nullable(); // marketing, followup, welcome, etc.
            $table->json('variables')->nullable(); // Available variables like {{name}}, {{company}}
            $table->boolean('is_active')->default(true);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        // Email campaigns
        Schema::create('email_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subject');
            $table->text('content');
            $table->foreignId('template_id')->nullable()->constrained('email_templates')->nullOnDelete();
            $table->enum('status', ['draft', 'scheduled', 'sending', 'sent', 'paused', 'cancelled'])->default('draft');
            $table->json('recipient_filter')->nullable(); // Filter criteria for leads
            $table->integer('total_recipients')->default(0);
            $table->integer('sent_count')->default(0);
            $table->integer('delivered_count')->default(0);
            $table->integer('opened_count')->default(0);
            $table->integer('clicked_count')->default(0);
            $table->integer('bounced_count')->default(0);
            $table->integer('unsubscribed_count')->default(0);
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        // Email logs (individual emails sent)
        Schema::create('email_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->nullable()->constrained('email_campaigns')->nullOnDelete();
            $table->foreignId('lead_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // If sent to user
            $table->string('to_email');
            $table->string('to_name')->nullable();
            $table->string('subject');
            $table->text('body');
            $table->enum('status', ['pending', 'sent', 'delivered', 'opened', 'clicked', 'bounced', 'failed'])->default('pending');
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('opened_at')->nullable();
            $table->timestamp('clicked_at')->nullable();
            $table->string('error_message')->nullable();
            $table->string('message_id')->nullable(); // For tracking
            $table->timestamps();

            $table->index(['campaign_id', 'status']);
            $table->index('to_email');
        });

        // Call logs
        Schema::create('call_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('phone_number');
            $table->enum('direction', ['outbound', 'inbound'])->default('outbound');
            $table->enum('status', ['answered', 'not_answered', 'busy', 'voicemail', 'wrong_number', 'other'])->default('answered');
            $table->integer('duration')->default(0); // in seconds
            $table->text('notes')->nullable();
            $table->datetime('called_at');
            $table->timestamps();

            $table->index(['lead_id', 'called_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_logs');
        Schema::dropIfExists('email_logs');
        Schema::dropIfExists('email_campaigns');
        Schema::dropIfExists('email_templates');
        Schema::dropIfExists('lead_imports');
        Schema::dropIfExists('lead_followups');
        Schema::dropIfExists('leads');
        Schema::dropIfExists('lead_statuses');
        Schema::dropIfExists('lead_sources');
    }
};
