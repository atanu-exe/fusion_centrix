<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

class SettingsController extends Controller
{
    /**
     * Setting types mapping
     */
    protected array $settingTypes = [
        'admin_theme' => 'string',
        'items_per_page' => 'integer',
        'timezone' => 'string',
        'site_name' => 'string',
        'site_description' => 'string',
        'contact_email' => 'string',
        'contact_phone' => 'string',
        'posts_per_page' => 'integer',
        'allow_comments' => 'boolean',
        'auto_publish_scheduled' => 'boolean',
        'mail_from_name' => 'string',
        'mail_from_address' => 'string',
        'notify_new_user' => 'boolean',
    ];

    /**
     * Setting groups mapping
     */
    protected array $settingGroups = [
        'admin_theme' => 'general',
        'items_per_page' => 'general',
        'timezone' => 'general',
        'site_name' => 'site',
        'site_description' => 'site',
        'contact_email' => 'site',
        'contact_phone' => 'site',
        'posts_per_page' => 'blog',
        'allow_comments' => 'blog',
        'auto_publish_scheduled' => 'blog',
        'mail_from_name' => 'email',
        'mail_from_address' => 'email',
        'notify_new_user' => 'email',
    ];

    /**
     * General settings
     */
    public function general()
    {
        // Get all settings
        $settings = Setting::getAll();
        
        // Get list of all PHP timezones for dropdown
        $timezones = $this->getTimezones();

        return view('admin.settings.general', compact('settings', 'timezones'));
    }

    /**
     * Update settings
     */
    public function update(Request $request)
    {
        $request->validate([
            'admin_theme' => 'nullable|in:light,dark,auto',
            'items_per_page' => 'nullable|integer|min:5|max:100',
            'timezone' => 'nullable|timezone',
            'site_name' => 'nullable|string|max:255',
            'site_description' => 'nullable|string|max:500',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'posts_per_page' => 'nullable|integer|min:1|max:50',
            'mail_from_name' => 'nullable|string|max:255',
            'mail_from_address' => 'nullable|email|max:255',
        ]);

        // List of all settings we want to save
        $settingsToSave = [
            'admin_theme',
            'items_per_page',
            'timezone',
            'site_name',
            'site_description',
            'contact_email',
            'contact_phone',
            'posts_per_page',
            'allow_comments',
            'auto_publish_scheduled',
            'mail_from_name',
            'mail_from_address',
            'notify_new_user',
        ];

        // Checkbox fields (they won't be in request if unchecked)
        $checkboxFields = ['allow_comments', 'auto_publish_scheduled', 'notify_new_user'];

        foreach ($settingsToSave as $key) {
            // Handle checkboxes - if not in request, they're unchecked (false)
            if (in_array($key, $checkboxFields)) {
                $value = $request->has($key) ? '1' : '0';
            } else {
                // Skip if not in request
                if (!$request->has($key)) {
                    continue;
                }
                $value = $request->input($key);
            }

            $type = $this->settingTypes[$key] ?? 'string';
            $group = $this->settingGroups[$key] ?? 'general';

            Setting::set($key, $value, $type, $group);
        }

        // Apply timezone immediately if changed
        if ($request->has('timezone') && $request->timezone) {
            Config::set('app.timezone', $request->timezone);
            date_default_timezone_set($request->timezone);
        }

        // Clear the settings cache
        Setting::clearCache();

        return back()->with('success', 'Settings updated successfully.');
    }

    /**
     * Get formatted timezone list
     */
    protected function getTimezones(): array
    {
        $timezones = [];
        $regions = [
            'Africa' => \DateTimeZone::AFRICA,
            'America' => \DateTimeZone::AMERICA,
            'Antarctica' => \DateTimeZone::ANTARCTICA,
            'Asia' => \DateTimeZone::ASIA,
            'Atlantic' => \DateTimeZone::ATLANTIC,
            'Australia' => \DateTimeZone::AUSTRALIA,
            'Europe' => \DateTimeZone::EUROPE,
            'Indian' => \DateTimeZone::INDIAN,
            'Pacific' => \DateTimeZone::PACIFIC,
        ];

        foreach ($regions as $regionName => $regionCode) {
            $zoneList = \DateTimeZone::listIdentifiers($regionCode);
            foreach ($zoneList as $zone) {
                $timezones[$regionName][$zone] = str_replace('_', ' ', str_replace($regionName . '/', '', $zone));
            }
        }

        // Add UTC at the beginning
        $timezones = ['UTC' => ['UTC' => 'UTC']] + $timezones;

        return $timezones;
    }
}
