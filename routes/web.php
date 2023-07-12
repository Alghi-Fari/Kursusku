<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaterialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/course', [DashboardController::class, 'course'])->name('course');
Route::get('/detail', [MaterialController::class, 'index'])->name('material');
Route::get('/edit/{id}', [MaterialController::class, 'edit'])->name('edit_materi');
Route::get('/delete/{id}', [MaterialController::class, 'destroy'])->name('delete_materi');
Route::post('/store', [MaterialController::class, 'store'])->name('store_materi');
Route::post('/update/{id}', [MaterialController::class, 'update'])->name('update_materi');

Route::resource('kursus', CourseController::class)->names('kursus');