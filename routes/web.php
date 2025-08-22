<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductVariantGalleryController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\ShopProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\PetController;
use App\Http\Controllers\Customer\AddressController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Email verification link (no auth required)
Route::get('/email/verify/{id}/{hash}', function ($id, $hash) {

    $user = User::findOrFail($id);

    if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        abort(403, 'Invalid verification link.');
    }

    if (!$user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
    }

    // Log in user after verification
    Auth::login($user);

    return redirect()->route('customer.dashboard')
        ->with('message', 'Your email has been verified!');
})->name('verification.verify');

// Resend verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


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
    Route::delete('admin/products/gallery/{id}', [ProductController::class, 'deleteGalleryImage'])->name('admin.products.gallery.delete');
    Route::delete('admin/products/main-image/{id}', [ProductController::class, 'deleteMainImage'])->name('admin.products.main-image.delete');
    // Categories routes
    Route::get('/admin-furry-cms/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin-furry-cms/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin-furry-cms/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin-furry-cms/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin-furry-cms/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin-furry-cms/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');


    //global product setting
     Route::get('/admin-furry-cms/products/settings', [ProductController::class, 'settings'])->name('admin.products.settings');
     Route::post('/admin-furry-cms/products/settings/colors', [ProductController::class, 'updateColors'])->name('admin.products.settings.colors.update');
});



Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('customer.dashboard');
});
Route::middleware(['auth','verified'])->prefix('customer')->name('customer.')->group(function () {

    // Profile
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
  
    Route::get('address', [AddressController::class, 'index'])->name('address.index');
    Route::post('address/store', [AddressController::class, 'store'])->name('address.store');
    Route::get('address/edit/{id}', [AddressController::class, 'edit'])->name('address.edit');
    Route::put('address/update/{id}', [AddressController::class, 'update'])->name('address.update');
    Route::get('address/delete/{id}', [AddressController::class, 'destroy'])->name('address.delete');

    // Pet Details
    // Route::get('pets', [PetController::class, 'index'])->name('pets.index');
    // Route::get('pets/create', [PetController::class, 'create'])->name('pets.create');
    // Route::post('pets', [PetController::class, 'store'])->name('pets.store');
    Route::get('pets', [PetController::class, 'index'])->name('pets.index');
    Route::post('pets', [PetController::class, 'store'])->name('pets.store');
    Route::get('pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');
    Route::put('pets/{id}', [PetController::class, 'update'])->name('pets.update');
    Route::delete('pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy');
});

Route::get('/about-us', function () { return view('about');})->name('about');
// Route::get('/shop', function () { return view('shop');})->name('shop');
Route::get('/community', function () { return view('community');})->name('community');
Route::get('/events', function () { return view('events');})->name('events');
Route::get('/contact-us', function () { return view('contact');})->name('contact');
Route::get('/blog', function () { return view('blog');})->name('blog');
Route::get('/booking-portal', function () { return view('booking');})->name('booking');


// PUBLIC SHOP
// Shop main page (only parent categories)
Route::get('/collections', [ShopController::class, 'index'])->name('shop.index');


// Unified route for both parent & child categories
Route::get('/collections/{slug}', [ShopController::class, 'category'])->name('shop.category');



// CART (guest + auth)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/items', [CartController::class, 'items'])->name('cart.items');

Route::get('/products/{slug}', [ShopProductController::class, 'show'])->name('product.show');


// CHECKOUT (auth only)
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/place-order', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/order/success/{id}', function ($id) {
        return view('frontend.checkout.success', ['orderId' => $id]);
    })->name('order.success');
});

