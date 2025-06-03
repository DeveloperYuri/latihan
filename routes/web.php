<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\CrudImageController;
use App\Http\Controllers\CrudSlugController;
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
Route::get('/crudshow/{id}', [CrudController::class, 'show'])->name('crudshow');

// CRUD Slug
Route::get('/crudslug', [CrudSlugController::class, 'index'])->name('crudslugindex');
Route::get('/createcrudslug', [CrudSlugController::class, 'create'])->name('createcrudslug');
Route::post('/createcrud/post', [CrudSlugController::class, 'store'])->name('createcrudslugpost');
Route::get('/crudslugedit/{slug}', [CrudSlugController::class, 'edit'])->name('crudslugedit');
Route::put('/crudslug/update/{slug}', [CrudSlugController::class, 'update'])->name('crudslugupdate');
Route::delete('/crudslug/delete/{id}', [CrudSlugController::class, 'destroy'])->name('crudslugdelete');
Route::get('/crudslugshow/{slug}', [CrudSlugController::class, 'show'])->name('crudslugshow');

// CRUD Image 
Route::get('/crudimage', [CrudImageController::class, 'index'])->name('crudimageindex');
Route::get('/createcrudimage', [CrudImageController::class, 'create'])->name('crudimagecreate');
Route::post('/crudimagepost', [CrudImageController::class, 'store'])->name('crudimagepost');
Route::delete('/crudimagedelete/{id}', [CrudImageController::class, 'destroy'])->name('crudimagedelete');
Route::get('/crudimageedit/{id}', [CrudImageController::class, 'edit'])->name('crudimageedit');
Route::put('/crudimage/update/{id}', [CrudImageController::class, 'update'])->name('crudimageupdate');
Route::get('/crudimageshow/{id}', [CrudImageController::class, 'show'])->name('crudimageshow');

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
