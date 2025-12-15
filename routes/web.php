<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectsController;
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


// ================crud project=================
Route::post('/projects',[ProjectsController::class, 'store'])->name('projects.store');
Route::get('/projects',[ProjectsController::class, 'index'])->name('projects.index');
Route::get('/projects/create',[ProjectsController::class, 'create'])->name('projects.create');
Route::get('/projects/{project}/edit',[ProjectsController::class, 'edit'])->name('projects.edit');
Route::patch('/projects/{project}',[ProjectsController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}',[ProjectsController::class, 'destroy'])->name('projects.destroy');

