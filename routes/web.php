<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSlideController;
use Illuminate\Support\Facades\Route;

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

//============= FRONTEND =============//
Route::get('/', function () {
    return view('frontend.index');
});

//============= BACKEND =============//
// admin routes
Route::controller(AdminController::class)->group(function() {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/profile/edit', 'profileEdit')->name('profile.edit2');
    Route::post('/admin/profile/edit', 'storeProfile')->name('store.profile');
    Route::get('/admin/change-password', 'changePassword')->name('change.password');
    Route::post('/admin/change-password', 'updatePassword')->name('update.password');
});

// home slider routes
Route::controller(HomeSlideController::class)->group(function() {
    Route::get('/slide', 'getHomeSlide')->name('home.slide');
    Route::post('/slide', 'updateHomeSlide')->name('update.slide');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
