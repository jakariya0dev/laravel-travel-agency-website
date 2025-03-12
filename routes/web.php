<?php

use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserDashController;
use Illuminate\Support\Facades\Route;

// Frontent Routes
Route::get('/', [HomepageController::class,'index'])->name('home');

// User Auth Routes
Route::get('/signup', [UserAuthController::class,'signup'])->name('user.signup.view');
Route::post('/signup', [UserAuthController::class,'signupSubmit'])->name('user.signup');
Route::get('/user-email/verify/{token}/{email}', [UserAuthController::class, 'verifyUserEmail'])->name('user.email.verify');
Route::get('/login', [UserAuthController::class,'loginView'])->name('user.login.view');
Route::post('/login', [UserAuthController::class,'loginSubmit'])->name('user.login');

Route::get('/forgot-password', [UserAuthController::class,'forgotPasswordView'])->name('user.password.forgot');
Route::post('/forgot-password', [UserAuthController::class,'forgotPasswordSubmit'])->name('user.password.email');
Route::get('/reset-password/{token}/{email}', [UserAuthController::class,'resetPasswordView'])->name('user.password.reset');
Route::post('/update-password/', [UserAuthController::class,'profileUpdateSubmit'])->name('user.password.update');


// User Dashboard Routes

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/dashboard', [UserDashController::class,'DashboardView'])->name('user.dashboard');
    Route::get('/profile', [UserAuthController::class,'profileView'])->name('user.profile');
    Route::post('/profile/update', [UserAuthController::class,'profileUpdateSubmit'])->name('user.profile.update');
    Route::get('/logout', [UserAuthController::class,'logout'])->name('user.logout');
});

Route::prefix('admin')->group(function (){

    Route::get('/login',[AdminAuthController::class, 'loginView'])->name('admin.login');
    Route::post('/login',[AdminAuthController::class, 'login'])->name('admin.login');
    
    Route::get('/reset-password/{token}/{email}',[AdminAuthController::class, 'resetPasswordView'])->name('admin.password.reset');
    Route::post('/update-password/{token}/{email}',[AdminAuthController::class, 'updatePassword'])->name('admin.password.update');
    Route::get('/forgot-password',[AdminAuthController::class, 'forgotPasswordView'])->name('admin.password.forgot');
    Route::post('/forgot-password',[AdminAuthController::class, 'forgotPasswordSubmit'])->name('admin.password.email');


});

Route::middleware('admin')->prefix('admin')->group(function (){

    Route::get('/logout',[AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard',[AdminDashboardController::class, 'viewDashboard'])->name('admin.dashboard');
    Route::get('/profile',[AdminAuthController::class, 'viewProfile'])->name('admin.profile');
    Route::get('/profile/edit',[AdminAuthController::class, 'profileEdit'])->name('admin.profile.edit');
    Route::put('/profile/update',[AdminAuthController::class, 'profileUpdate'])->name('admin.profile.update');

    

    // Homepage 
    Route::resource('slider', AdminSliderController::class);
    Route::get('/about/edit',[AdminAboutController::class, 'aboutEdit'])->name('admin.about.edit');
    Route::put('/about/update',[AdminAboutController::class, 'aboutUpdate'])->name('admin.about.update');
});
