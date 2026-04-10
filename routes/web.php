<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactBranchController;
use App\Http\Controllers\Admin\CustomizationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DynamicPageController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GiftingOccasionController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileSettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Models\GiftingOccasion;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\FrontController;

Route::controller(FrontController::class)->group(function () {

    Route::get('/', 'home')->name('home');
    Route::get('/why-us', 'whyUs')->name('why-us');
    Route::get('/vendors', 'vendors')->name('vendors');
    Route::get('/contact-us', 'contactUs')->name('contact-us');
    Route::get('/products', 'products')->name('products');
    Route::get('/products/{id}', 'productDetails')->name('product.details');
    Route::get('/shopping-cart', 'shoppingCart')->name('shopping-cart');
    Route::get('/categories', 'category')->name('category');
    Route::get('/subcategories', 'subcategory')->name('subcategory');
    Route::get('/membership', 'membership')->name('membership');
    Route::get('/job-openings', 'jobOpenings')->name('job-openings');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/faqs', 'faqs')->name('faqs');
    Route::get('/careers', 'careers')->name('careers');
    Route::get('/bulk-order', 'bulkOrder')->name('bulk-order');
    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/blog/{id}', 'blogDetails')->name('blog.details');
    Route::get('/about-us', 'aboutUs')->name('about-us');
    Route::get('/awards', 'awards')->name('awards');

});

// Admin Routes list
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/profile-setting', ProfileSettingController::class);
        Route::post('/resetpassword', [ProfileSettingController::class, 'resetPassword'])->name('reset.password');

        Route::resource('categories', CategoryController::class);

        Route::resource('gifting-occasions', GiftingOccasionController::class);

        Route::resource('products', ProductController::class)->names('products');

        Route::resource('customizations', CustomizationController::class);

        Route::resource('pages', DynamicPageController::class)->names('pages');

        Route::resource('faqs', FaqController::class)->names('faqs');

        Route::resource('blogs', BlogController::class)->names('blogs');

        Route::resource('brands', BrandController::class)->names('brands');

        Route::resource('clients', ClientController::class)->names('clients');

        Route::resource('testimonials', TestimonialController::class)->names('testimonials');

        Route::resource('contact-branches', ContactBranchController::class);

        Route::get('/logout', [LogoutController::class, 'logout']);

    });
});
