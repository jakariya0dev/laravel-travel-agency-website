<?php

use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminBlogCategoryController;
use App\Http\Controllers\AdminBlogPostController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDestinationController;
use App\Http\Controllers\AdminDestinationGalleryController;
use App\Http\Controllers\AdminFaqController;
use App\Http\Controllers\AdminFeatureController;
use App\Http\Controllers\AdminPackageFaqController;
use App\Http\Controllers\AdminPackageGalleryController;
use App\Http\Controllers\AdminPackageServiceController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\DestinationGalleryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageFaqController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserDashController;
use Illuminate\Support\Facades\Route;

// Frontent Routes
Route::get('/', [HomepageController::class,'index'])->name('home');
Route::get('/destinations', [PageController::class,'destinationsPageView'])->name('destinations');
Route::get('/faq', [PageController::class,'faqPageView'])->name('faq');
Route::get('/blog', [PageController::class,'blogPageView'])->name('blog');
Route::get('/blog/category/{id}', [PageController::class,'blogBycategory'])->name('blog.category');
Route::get('/blog/post/{id}/{slug}', [PageController::class,'blogPostPageView'])->name('blog.post');

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
    Route::resource('review', AdminReviewController::class);
    Route::resource('faq', AdminFaqController::class);
    Route::resource('destinations', AdminDestinationController::class);
    Route::resource('package', PackageController::class);
    

    Route::get('destinations/photo/gallery/{id}',[AdminDestinationGalleryController::class, 'photoGalleryIndex'])->name('admin.d-photo.index');
    Route::post('destinations/photo/gallery/',[AdminDestinationGalleryController::class, 'storeImage'])->name('admin.d-photo.store');
    Route::delete('destinations/photo/gallery/delete/{id}',[AdminDestinationGalleryController::class, 'deleteImage'])->name('admin.d-photo.delete');

    Route::get('destinations/video/gallery/{id}',[AdminDestinationGalleryController::class, 'videoGalleryIndex'])->name('admin.d-video.index');
    Route::post('destinations/video/gallery/',[AdminDestinationGalleryController::class, 'storeVideo'])->name('admin.d-video.store');
    Route::delete('destinations/video/gallery/delete/{id}',[AdminDestinationGalleryController::class, 'deleteVideo'])->name('admin.d-video.delete');

    Route::get('package/photo/gallery/{id}',[AdminPackageGalleryController::class, 'photoGalleryIndex'])->name('admin.p-photo.index');
    Route::post('package/photo/gallery/',[AdminPackageGalleryController::class, 'storeImage'])->name('admin.p-photo.store');
    Route::delete('package/photo/gallery/delete/{id}',[AdminPackageGalleryController::class, 'deleteImage'])->name('admin.p-photo.delete');

    Route::get('package/video/gallery/{id}',[AdminPackageGalleryController::class, 'videoGalleryIndex'])->name('admin.p-video.index');
    Route::post('package/video/gallery/',[AdminPackageGalleryController::class, 'storeVideo'])->name('admin.p-video.store');
    Route::delete('package/video/gallery/delete/{id}',[AdminPackageGalleryController::class, 'deleteVideo'])->name('admin.p-video.delete');

    Route::get('package/inlclude/{id}',[AdminPackageServiceController::class, 'packageIncludeIndex'])->name('admin.p-include.index');
    Route::post('package/inlclude/',[AdminPackageServiceController::class, 'packageIncludeStore'])->name('admin.p-include.store');
    Route::delete('package/inlclude/delete/{id}',[AdminPackageServiceController::class, 'packageIncludeDelete'])->name('admin.p-include.delete');

    Route::get('package/exclude/{id}',[AdminPackageServiceController::class, 'packageExcludeIndex'])->name('admin.p-exclude.index');
    Route::post('package/exclude/',[AdminPackageServiceController::class, 'packageExcludeStore'])->name('admin.p-exclude.store');
    Route::delete('package/exclude/{id}',[AdminPackageServiceController::class, 'packageExcludeDelete'])->name('admin.p-exclude.delete');

    Route::get('package/faq/{id}', [AdminPackageFaqController::class,'index'])->name('package-faq.index');
    Route::get('package/faq/create/{id}', [AdminPackageFaqController::class,'create'])->name('package-faq.create');
    Route::post('package/faq/store', [AdminPackageFaqController::class,'store'])->name('package-faq.store');
    Route::get('package/faq/edit/{id}', [AdminPackageFaqController::class,'edit'])->name('package-faq.edit');
    Route::put('package/faq/update/{id}', [AdminPackageFaqController::class,'update'])->name('package-faq.update');
    Route::delete('package/faq/delete/{id}', [AdminPackageFaqController::class,'destroy'])->name('package-faq.destroy');
    
    Route::resource('blog-post', AdminBlogPostController::class);
    Route::resource('blog-category', AdminBlogCategoryController::class);
    Route::get('/about/edit',[AdminAboutController::class, 'aboutEdit'])->name('admin.about.edit');
    Route::put('/about/update',[AdminAboutController::class, 'aboutUpdate'])->name('admin.about.update');
    Route::get('/feature/edit',[AdminFeatureController::class, 'featureEdit'])->name('admin.feature.edit');
    Route::put('/feature/update',[AdminFeatureController::class, 'featureUpdate'])->name('admin.feature.update');
});  
