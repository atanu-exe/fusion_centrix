<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();

            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('project_id')->nullable()->constrained()->nullOnDelete();

            $table->date('issue_date');
            $table->date('due_date');
            $table->enum('status', ['draft', 'sent', 'partially_paid', 'paid', 'overdue', 'cancelled'])
                ->default('draft');

            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('tax_amount', 12, 2)->default(0);
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->decimal('paid_amount', 12, 2)->default(0);
            $table->string('currency', 10)->default('USD');

            $table->text('notes')->nullable();
            $table->text('terms')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['client_id']);
            $table->index(['project_id']);
            $table->index(['status']);
            $table->index(['due_date']);
        });

        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();

            $table->string('description');
            $table->decimal('quantity', 10, 2)->default(1);
            $table->decimal('unit_price', 12, 2);
            $table->decimal('tax_rate', 5, 2)->default(0); // percentage
            $table->decimal('amount', 12, 2); // quantity * unit_price (pre-tax line total)
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
        Schema::dropIfExists('invoices');
    }
};