<?php

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\Home\HomeSlideController;
use App\Http\Controllers\Backend\Home\AboutController;
use App\Http\Controllers\Backend\Home\FooterController;
use App\Http\Controllers\Backend\Home\MessageController;
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
    Route::get('/about-me', 'getAboutPage')->name('home.about');
    Route::get('/pdf-viewer', 'showPDF')->name('show.pdf');
    Route::get('/contact', 'getContactPage')->name('home.contact');
    Route::post('/send-message', 'sendMessage')->name('send.message');
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
    Route::get('/admin/slide', 'getHomeSlide')->name('home.slide');
    Route::post('/admin/slide', 'updateHomeSlide')->name('update.slide');
});

// about me routes
Route::controller(AboutController::class)->group(function() {
    Route::get('/admin/about-me', 'getAboutMe')->name('about.me.basic');
    Route::post('/admin/about-me', 'updateAboutMe')->name('update.about.me');

    Route::get('/admin/award', 'getAward')->name('index.award');
    Route::get('/admin/award/add', 'addAward')->name('add.award');
    Route::post('/admin/award/store', 'storeAward')->name('store.award');
    Route::get('/admin/award/edit/{id}', 'editAward')->name('edit.award');
    Route::post('/admin/award/update/{id}', 'updateAward')->name('update.award');
    Route::post('/admin/award/delete', 'deleteAward')->name('delete.award');

    Route::get('/admin/education', 'getEducation')->name('index.education');
    Route::get('/admin/education/add', 'addEducation')->name('add.education');
    Route::post('/admin/education/store', 'storeEducation')->name('store.education');
    Route::get('/admin/education/edit/{id}', 'editEducation')->name('edit.education');
    Route::post('/admin/education/update/{id}', 'updateEducation')->name('update.education');
    Route::post('/admin/education/delete', 'deleteEducation')->name('delete.education');

    Route::get('/admin/skill', 'getSkill')->name('index.skill');
    Route::get('/admin/skill/add', 'addSkill')->name('add.skill');
    Route::post('/admin/skill/store', 'storeSkill')->name('store.skill');
    Route::get('/admin/skill/edit/{id}', 'editSkill')->name('edit.skill');
    Route::post('/admin/skill/update', 'updateSkill')->name('update.skill');
    Route::post('/admin/skill/delete', 'deleteSkill')->name('delete.skill');
});

// footer routes
Route::controller(FooterController::class)->group(function() {
    Route::get('/admin/contact-me', 'getContactMe')->name('index.contact.me');
    Route::post('/admin/contact-me', 'updateContactMe')->name('update.contact.me');
    Route::get('/admin/my-address', 'getMyAddress')->name('index.my.address');
    Route::post('/admin/my-address', 'updateMyAddress')->name('update.my.address');
    Route::get('/admin/social', 'getSocial')->name('index.social');
    Route::post('/admin/social', 'updateSocial')->name('update.social');
});

// message routes
Route::controller(MessageController::class)->group(function() {
    Route::get('/admin/message', 'getMessage')->name('index.message');
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
