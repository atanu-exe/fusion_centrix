<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->cascadeOnDelete();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete(); // denormalized for fast client-level reporting

            $table->decimal('amount', 12, 2);
            $table->date('payment_date');
            $table->enum('method', ['bank_transfer', 'card', 'cash', 'cheque', 'online', 'other'])
                ->default('bank_transfer');
            $table->string('reference_number')->nullable();
            $table->text('notes')->nullable();

            $table->foreignId('recorded_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();

            $table->index(['invoice_id']);
            $table->index(['client_id']);
            $table->index(['payment_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};