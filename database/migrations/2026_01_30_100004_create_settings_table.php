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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type')->default('string'); // string, boolean, integer, json
            $table->string('group')->default('general'); // general, site, blog, email
            $table->timestamps();
        });

        // Insert default settings
        $defaultSettings = [
            // General Settings
            ['key' => 'admin_theme', 'value' => 'light', 'type' => 'string', 'group' => 'general'],
            ['key' => 'items_per_page', 'value' => '15', 'type' => 'integer', 'group' => 'general'],
            ['key' => 'timezone', 'value' => 'UTC', 'type' => 'string', 'group' => 'general'],
            
            // Site Settings
            ['key' => 'site_name', 'value' => 'FusionCentrix', 'type' => 'string', 'group' => 'site'],
            ['key' => 'site_description', 'value' => 'Your trusted digital partner', 'type' => 'string', 'group' => 'site'],
            ['key' => 'contact_email', 'value' => 'info@fusioncentrix.com', 'type' => 'string', 'group' => 'site'],
            ['key' => 'contact_phone', 'value' => '', 'type' => 'string', 'group' => 'site'],
            
            // Blog Settings
            ['key' => 'posts_per_page', 'value' => '10', 'type' => 'integer', 'group' => 'blog'],
            ['key' => 'allow_comments', 'value' => '1', 'type' => 'boolean', 'group' => 'blog'],
            ['key' => 'auto_publish_scheduled', 'value' => '1', 'type' => 'boolean', 'group' => 'blog'],
            
            // Email Settings
            ['key' => 'mail_from_name', 'value' => 'FusionCentrix', 'type' => 'string', 'group' => 'email'],
            ['key' => 'mail_from_address', 'value' => 'noreply@fusioncentrix.com', 'type' => 'string', 'group' => 'email'],
            ['key' => 'notify_new_user', 'value' => '1', 'type' => 'boolean', 'group' => 'email'],
        ];

        $now = now();
        foreach ($defaultSettings as &$setting) {
            $setting['created_at'] = $now;
            $setting['updated_at'] = $now;
        }

        DB::table('settings')->insert($defaultSettings);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
