<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'indexhomepage'])->name('indexhomepage');

// Dashboard
// Route::get('/dashboard', [DashboardController::class, 'indexdashboard'])->name('indexdashboard');

Route::get('/dashboardhomepage', [DashboardController::class, 'indextest'])->name('indexdashboard');

//CRUD
Route::get('/crud', [CrudController::class, 'index'])->name('crudindex');
Route::get('/createcrud', [CrudController::class, 'create'])->name('createcrud');
Route::post('/postcrud', [CrudController::class, 'store'])->name('postcrud');
Route::delete('/deletecrud/{id}', [CrudController::class, 'destroy'])->name('deletecrud');
Route::get('/editcrudtest/{id}', [CrudController::class, 'edit'])->name('editcrudbasic');
Route::put('/crud/update/{id}', [CrudController::class, 'update'])->name('crudupdate');
