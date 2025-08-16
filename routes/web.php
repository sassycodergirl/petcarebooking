<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductVariantGalleryController;
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
    return view('index');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-furry-cms', function () {return view('admin.dashboard');})->name('admin.dashboard');
    
    // Products routes
    Route::get('/admin-furry-cms/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin-furry-cms/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin-furry-cms/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin-furry-cms/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin-furry-cms/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin-furry-cms/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::delete('/admin-furry-cms/variant-gallery/{id}', [ProductVariantGalleryController::class, 'destroy'])->name('admin.variants.gallery.delete');
    Route::delete('/admin-furry-cms/variant-image/{id}', [ProductVariantGalleryController::class, 'destroyMainImage'])->name('admin.variants.main-image.delete');


    // Categories routes
    Route::get('/admin-furry-cms/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin-furry-cms/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin-furry-cms/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin-furry-cms/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin-furry-cms/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin-furry-cms/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/about-us', function () { return view('about');})->name('about');
Route::get('/shop', function () { return view('shop');})->name('shop');
Route::get('/community', function () { return view('community');})->name('community');
Route::get('/events', function () { return view('events');})->name('events');
Route::get('/contact-us', function () { return view('contact');})->name('contact');
Route::get('/blog', function () { return view('blog');})->name('blog');
Route::get('/booking-portal', function () { return view('booking');})->name('booking');


