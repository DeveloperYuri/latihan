<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\CrudImageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'indexhomepage'])->name('indexhomepage');

//CRUD
Route::get('/crud', [CrudController::class, 'index'])->name('crudindex');
Route::get('/createcrud', [CrudController::class, 'create'])->name('createcrud');
Route::post('/postcrud', [CrudController::class, 'store'])->name('postcrud');
Route::delete('/deletecrud/{id}', [CrudController::class, 'destroy'])->name('deletecrud');
Route::get('/editcrudtest/{id}', [CrudController::class, 'edit'])->name('editcrudbasic');
Route::put('/crud/update/{id}', [CrudController::class, 'update'])->name('crudupdate');

// CRUD Image 
Route::get('/crudimage', [CrudImageController::class, 'index'])->name('crudimageindex');
Route::get('/createcrudimage', [CrudImageController::class, 'create'])->name('crudimagecreate');
Route::post('/crudimagepost', [CrudImageController::class, 'store'])->name('crudimagepost');
Route::delete('/crudimagedelete/{id}', [CrudImageController::class, 'destroy'])->name('crudimagedelete');
Route::get('/crudimageedit/{id}', [CrudImageController::class, 'edit'])->name('crudimageedit');
Route::put('/crudimage/update/{id}', [CrudImageController::class, 'update'])->name('crudimageupdate');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Dashboard
    // Route::get('/dashboard', [DashboardController::class, 'indexdashboard'])->name('indexdashboard');

    Route::get('/dashboardhomepage', [DashboardController::class, 'indextest'])->name('indexdashboard');

    // //CRUD
    // Route::get('/crud', [CrudController::class, 'index'])->name('crudindex');
    // Route::get('/createcrud', [CrudController::class, 'create'])->name('createcrud');
    // Route::post('/postcrud', [CrudController::class, 'store'])->name('postcrud');
    // Route::delete('/deletecrud/{id}', [CrudController::class, 'destroy'])->name('deletecrud');
    // Route::get('/editcrudtest/{id}', [CrudController::class, 'edit'])->name('editcrudbasic');
    // Route::put('/crud/update/{id}', [CrudController::class, 'update'])->name('crudupdate');
});

require __DIR__ . '/auth.php';
