<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');

Route::post('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');

Route::get('/employee/work', [EmployeeController::class, 'work'])->name('employee.work');