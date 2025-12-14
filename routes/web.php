<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// ================dashboard================
Route::get('/admin',[AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/linkes',[AdminController::class, 'linkes'])->name('admin.linkes');
Route::get('/admin/client',[AdminController::class, 'client'])->name('admin.client');
Route::get('/login',[AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/cv',[AdminController::class, 'cv'])->name('admin.cv');
Route::get('/admin/projects',[AdminController::class, 'projects'])->name('admin.projects');
