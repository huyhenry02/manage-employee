<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\WorkHourController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');

Route::group([
    'prefix' => 'admin'
], function () {
    Route::group([
        'prefix' => 'employee'
    ], function () {
        Route::get('/index', [EmployeeController::class, 'showIndex'])->name('employee.showIndex');
        Route::get('/update', [EmployeeController::class, 'showUpdate'])->name('employee.showUpdate');
        Route::get('/create', [EmployeeController::class, 'showCreate'])->name('employee.showCreate');

        Route::post('/create', [EmployeeController::class, 'create'])->name('employee.create');
    });

    Route::group([
        'prefix' => 'position'
    ], function () {
        Route::get('/index', [PositionController::class, 'showIndex'])->name('position.showIndex');
        Route::get('/update', [PositionController::class, 'showUpdate'])->name('position.showUpdate');
        Route::get('/create', [PositionController::class, 'showCreate'])->name('position.showCreate');
    });

    Route::group([
        'prefix' => 'department'
    ], function () {
        Route::get('/index', [DepartmentController::class, 'showIndex'])->name('department.showIndex');
        Route::get('/update', [DepartmentController::class, 'showUpdate'])->name('department.showUpdate');
        Route::get('/create', [DepartmentController::class, 'showCreate'])->name('department.showCreate');
    });

    Route::group([
        'prefix' => 'salary'
    ], function () {
        Route::get('/index', [SalaryController::class, 'showIndex'])->name('salary.showIndex');
        Route::get('/update', [SalaryController::class, 'showUpdate'])->name('salary.showUpdate');
        Route::get('/create', [SalaryController::class, 'showCreate'])->name('salary.showCreate');
    });

    Route::group([
        'prefix' => 'work_hour'
    ], function () {
        Route::get('/index', [WorkHourController::class, 'showIndex'])->name('work_hour.showIndex');
        Route::get('/update', [WorkHourController::class, 'showUpdate'])->name('work_hour.showUpdate');
        Route::get('/create', [WorkHourController::class, 'showCreate'])->name('work_hour.showCreate');
    });
});
