<?php

use App\Http\Controllers\SonyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/me', [SonyController::class, 'index'])->name('me.index');
// Route::post('/me', [SonyController::class, 'store'])->name('me.store');

// Route::get('/counter', Counter::class);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'redirectUser'])->name('dashboard');
    
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:user'])->group(function () {

    Route::get('/home', function () {
        return view('dashboard');
    })->name('user.dashboard');
    
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');

});
