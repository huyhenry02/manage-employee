<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeePerformanceController;

Route::get('/', function () {
    return view('layouts.main');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'postLogout'])->name('postLogout');

Route::group([
    'prefix' => 'admin'
], function () {
    Route::group([
        'prefix' => 'employee'
    ], function () {
        Route::get('/index', [EmployeeController::class, 'showIndex'])->name('employee.showIndex');
        Route::get('/update/{user}', [EmployeeController::class, 'showUpdate'])->name('employee.showUpdate');
        Route::get('/detail/{user}', [EmployeeController::class, 'showDetail'])->name('employee.showDetail');
        Route::get('/create', [EmployeeController::class, 'showCreate'])->name('employee.showCreate');

        Route::post('/create', [EmployeeController::class, 'create'])->name('employee.create');
        Route::post('/update', [EmployeeController::class, 'update'])->name('employee.update');
    });

    Route::group([
        'prefix' => 'position'
    ], function () {
        Route::get('/index', [PositionController::class, 'showIndex'])->name('position.showIndex');

        Route::get('/update/{id}', [PositionController::class, 'showUpdate'])->name('position.showUpdate');
        Route::post('/update/{id}', [PositionController::class, 'update'])->name('position.update');

        Route::get('/create', [PositionController::class, 'showCreate'])->name('position.showCreate');
        Route::post('/create', [PositionController::class, 'create'])->name('position.create');

        Route::get('/delete/{id}', [PositionController::class, 'delete'])->name('position.delete');
    });

    Route::group([
        'prefix' => 'department'
    ], function () {
        Route::get('/index', [DepartmentController::class, 'showIndex'])->name('department.showIndex');

        Route::get('/update/{id}', [DepartmentController::class, 'showUpdate'])->name('department.showUpdate');
        Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('department.update');

        Route::get('/create', [DepartmentController::class, 'showCreate'])->name('department.showCreate');
        Route::post('/create', [DepartmentController::class, 'create'])->name('department.create');

        Route::get('/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');
    });

    Route::group([
        'prefix' => 'contract'
    ], function () {
        Route::get('/index', [ContractController::class, 'showIndex'])->name('contract.showIndex');
        Route::get('/update/{contract}', [ContractController::class, 'showUpdate'])->name('contract.showUpdate');
        Route::get('/create', [ContractController::class, 'showCreate'])->name('contract.showCreate');

        Route::post('/create', [ContractController::class, 'postCreate'])->name('contract.postCreate');
        Route::post('/update/{contract}', [ContractController::class, 'postUpdate'])->name('contract.postUpdate');
        Route::get('/delete/{contract}', [ContractController::class, 'delete'])->name('contract.delete');

    });

    Route::group([
        'prefix' => 'employee-performance'
    ], function () {
        Route::get('/index', [EmployeePerformanceController::class, 'showIndex'])->name('employee-performance.showIndex');
        Route::get('/update/{employeePerformance}', [EmployeePerformanceController::class, 'showUpdate'])->name('employee-performance.showUpdate');
        Route::get('/create', [EmployeePerformanceController::class, 'showCreate'])->name('employee-performance.showCreate');

        Route::post('/create', [EmployeePerformanceController::class, 'postCreate'])->name('employee-performance.postCreate');
        Route::post('/update/{employeePerformance}', [EmployeePerformanceController::class, 'postUpdate'])->name('employee-performance.postUpdate');
        Route::get('/delete/{employeePerformance}', [EmployeePerformanceController::class, 'delete'])->name('employee-performance.delete');

    });
});
