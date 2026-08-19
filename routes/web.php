<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseControler;

/*
|--------------------------------------------------------------------------
| Web Routes — Centro de Formação
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index'])->name('painel');
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/cursos', [CourseControler::class, 'index'])->name('cursos');