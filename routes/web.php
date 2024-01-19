<?php

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\Home\HomeSlideController;
use App\Http\Controllers\Backend\Home\AboutController;
use App\Http\Controllers\Frontend\FrontendController;
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
Route::controller(FrontendController::class)->group(function() {
    Route::get('/', 'getMainPage');
    Route::get('/home/about-me', 'getAboutPage')->name('home.about');
    Route::get('/pdf-viewer', 'showPDF')->name('show.pdf');
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

// about me routes
Route::controller(AboutController::class)->group(function() {
    Route::get('/about-me', 'getAboutMe')->name('about.me.basic');
    Route::post('/about-me', 'updateAboutMe')->name('update.about.me');
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
