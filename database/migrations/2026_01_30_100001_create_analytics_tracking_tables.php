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
        // Page visits tracking
        Schema::create('page_visits', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->index();
            $table->string('visitor_id')->index(); // Cookie-based visitor ID
            $table->string('ip_address', 45);
            $table->string('url');
            $table->string('page_title')->nullable();
            $table->string('referrer')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('device_type')->nullable(); // desktop, mobile, tablet
            $table->string('browser')->nullable();
            $table->string('os')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->integer('time_on_page')->default(0); // in seconds
            $table->boolean('is_bounce')->default(false);
            $table->boolean('is_returning_visitor')->default(false);
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();

            $table->index(['created_at', 'url']);
            $table->index(['visitor_id', 'created_at']);
        });

        // Visitor sessions
        Schema::create('visitor_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_id')->index();
            $table->string('session_id')->unique();
            $table->string('ip_address', 45);
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('device_type')->nullable();
            $table->string('browser')->nullable();
            $table->string('os')->nullable();
            $table->string('landing_page')->nullable();
            $table->string('exit_page')->nullable();
            $table->string('referrer')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->integer('page_views')->default(1);
            $table->integer('duration')->default(0); // Total session duration in seconds
            $table->boolean('is_returning_visitor')->default(false);
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('ended_at')->nullable();
            $table->timestamps();
        });

        // Daily aggregated stats for faster queries
        Schema::create('analytics_daily', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->integer('total_visits')->default(0);
            $table->integer('unique_visitors')->default(0);
            $table->integer('page_views')->default(0);
            $table->integer('returning_visitors')->default(0);
            $table->integer('new_visitors')->default(0);
            $table->decimal('avg_time_on_site', 10, 2)->default(0);
            $table->decimal('bounce_rate', 5, 2)->default(0);
            $table->json('top_pages')->nullable();
            $table->json('top_countries')->nullable();
            $table->json('devices')->nullable();
            $table->json('browsers')->nullable();
            $table->json('referrers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_daily');
        Schema::dropIfExists('visitor_sessions');
        Schema::dropIfExists('page_visits');
    }
};
