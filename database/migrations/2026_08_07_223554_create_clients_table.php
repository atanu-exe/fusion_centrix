<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            // Core details
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('alternate_phone')->nullable();
            $table->string('website')->nullable();

            // Address / billing details
            $table->string('billing_address')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('currency', 10)->default('USD');
            $table->unsignedSmallInteger('payment_terms_days')->default(15);

            // Status & ownership
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('account_manager_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

            // Lead conversion link (nullable — clients can also be entered directly)
            $table->foreignId('converted_from_lead_id')->nullable()->constrained('leads')->nullOnDelete();

            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['status']);
            $table->index(['account_manager_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};