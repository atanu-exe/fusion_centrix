<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category')->nullable(); // e.g. Design, Development, Marketing, Hosting
            $table->text('description')->nullable();

            // Pricing
            $table->decimal('default_price', 12, 2)->default(0);
            $table->string('currency', 10)->default('USD');
            $table->enum('billing_cycle', ['one_time', 'monthly', 'quarterly', 'yearly'])->default('one_time');
            $table->decimal('default_tax_rate', 5, 2)->default(0); // percentage, e.g. 18.00 for 18% GST

            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['is_active']);
            $table->index(['category']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};