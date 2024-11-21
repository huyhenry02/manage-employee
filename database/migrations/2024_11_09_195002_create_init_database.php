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
        // Create departments table
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department_name');
            $table->timestamps();
        });

        // Create positions table
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('position_title');
            $table->text('description')->nullable();
            $table->integer('base_salary');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('position_id')->constrained('positions')->onDelete('cascade');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
        });

        // Create contracts table
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name', 255);
            $table->date('start_date');
            $table->date('end_date');
            $table->text('terms')->nullable();
            $table->integer('gross_salary');
            $table->string('attachment_file')->nullable();
            $table->enum('status', ['inactive', 'active']);
            $table->timestamps();
        });

        // Create employee_performance table
        Schema::create('employee_performance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('users')->onDelete('cascade');
            $table->date('review_date');
            $table->integer('performance_score');
            $table->foreignId('reviewer_id')->constrained('users')->onDelete('cascade');
            $table->integer('total_salary');
            $table->integer('work_hours');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_performance');
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('departments');
    }
};
