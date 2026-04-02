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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('category', ['Website', 'Mobile App', 'Graphics', 'Branding', 'UI/UX Design', 'E-commerce', 'SaaS', 'Custom Software'])->index();
            $table->text('description');
            $table->string('short_description');
            $table->string('image_url');
            $table->string('thumb_url');
            $table->string('client_name');
            $table->string('client_industry')->nullable();
            $table->json('technologies')->nullable();
            $table->string('project_url')->nullable();
            $table->string('live_demo_url')->nullable();
            $table->string('case_study_url')->nullable();
            $table->json('results')->nullable();
            $table->integer('year_completed')->nullable();
            $table->boolean('featured')->default(false)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
