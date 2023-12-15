<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::post('/services/create', [ServiceController::class, 'create'])->name('services.create');

Route::put('/services/{id}/update', [ServiceController::class, 'update'])->name('services.update');

Route::put('/services/{id}/finish', [ServiceController::class, 'finish'])->name('services.finish');