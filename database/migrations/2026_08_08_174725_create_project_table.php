<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();

            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('status', ['planning', 'in_progress', 'on_hold', 'completed', 'cancelled'])
                ->default('planning');

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('budget', 12, 2)->nullable();
            $table->string('currency', 10)->default('USD');

            $table->foreignId('manager_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['client_id']);
            $table->index(['status']);
        });

        Schema::create('project_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();

            $table->decimal('price', 12, 2); // snapshot / override of service->default_price at time of attach
            $table->unsignedInteger('quantity')->default(1);
            $table->string('notes')->nullable();

            $table->timestamps();

            $table->unique(['project_id', 'service_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_services');
        Schema::dropIfExists('projects');
    }
};