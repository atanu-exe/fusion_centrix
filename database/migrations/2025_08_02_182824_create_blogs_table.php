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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            // Content fields
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->longText('content');

            // Media fields
            $table->string('featured_image')->nullable();
            $table->string('thumbnail_image')->nullable();

            // Engagement fields
            $table->unsignedBigInteger('views')->default(0)->index();
            $table->unsignedBigInteger('shares')->default(0);

            // Publishing fields
            $table->boolean('is_published')->default(false)->index();
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('published_at')->nullable()->index();

            // User relationships
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('last_edited_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('published_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
