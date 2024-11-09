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
            $table->foreignId('manager_id')->nullable()->constrained('users')->onDelete('set null');
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

        // Create salaries table
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('users')->onDelete('cascade');
            $table->integer('base_salary');
            $table->integer('bonus');
            $table->integer('deductions');
            $table->integer('net_salary');
            $table->date('month_year');
            $table->timestamps();
        });

        // Create work_hours table
        Schema::create('work_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('users')->onDelete('cascade');
            $table->date('date');
            $table->integer('hours_worked');
            $table->integer('overtime_hours')->nullable();
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
        Schema::dropIfExists('work_hours');
        Schema::dropIfExists('salaries');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('departments');
    }
};