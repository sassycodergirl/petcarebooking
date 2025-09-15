<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductVariantGalleryController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\BookingManagementController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\ShopProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\PetController;
use App\Http\Controllers\Customer\AddressController;
use App\Http\Controllers\Auth\PhoneAuthController;
use App\Http\Controllers\Customer\BookingController as CustomerBookingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// -----------------------------
// REMOVE email verification routes
// -----------------------------

// -----------------------------
// Phone OTP Authentication Routes
// -----------------------------
Route::middleware('guest')->group(function () {
    Route::get('/auth/phone', [PhoneAuthController::class, 'showPhoneForm'])->name('phone.login.form');
    Route::post('/auth/phone', [PhoneAuthController::class, 'sendOtp'])->name('phone.login.send')->middleware('throttle:6,1');

    Route::get('/auth/phone/verify', [PhoneAuthController::class, 'showVerifyForm'])->name('phone.login.verify.form');
    Route::post('/auth/phone/verify', [PhoneAuthController::class, 'verifyOtp'])->name('phone.login.verify')->middleware('throttle:6,1');

    Route::post('/auth/phone/resend', [PhoneAuthController::class, 'resendOtp'])->name('phone.login.resend')->middleware('throttle:3,1');
});

// -----------------------------
// Public Pages
// -----------------------------
Route::get('/', function () {
    return view('index');
})->name('index');

// if you want to keep default login/register (email+password), uncomment below
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -----------------------------
// Admin CMS (auth + admin)
// -----------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-furry-cms', function () {return view('admin.dashboard'); })->name('admin.dashboard');

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

    // Global product setting
    Route::get('/admin-furry-cms/products/settings', [ProductController::class, 'settings'])->name('admin.products.settings');
    Route::post('/admin-furry-cms/products/settings/colors', [ProductController::class, 'updateColors'])->name('admin.products.settings.colors.update');

    // Booking Management
    Route::prefix('admin-furry-cms/bookings')->name('admin.bookings.')->group(function () {
        Route::get('/', [BookingManagementController::class, 'index'])->name('index'); // All bookings
        Route::get('/upcoming', [BookingManagementController::class, 'upcoming'])->name('upcoming'); // Upcoming
        Route::get('/past', [BookingManagementController::class, 'past'])->name('past'); // Past
        Route::get('/cancelled', [BookingManagementController::class, 'cancelled'])->name('cancelled'); // Cancelled
        Route::get('/pending', [BookingManagementController::class, 'pending'])->name('pending'); // Pending approvals
      
        Route::get('/{booking}', [BookingManagementController::class, 'show'])->name('show'); // Single booking details
        Route::post('/{booking}/approve', [BookingManagementController::class, 'approve'])->name('approve'); // Approve booking
        Route::post('/{booking}/cancel', [BookingManagementController::class, 'cancel'])->name('cancel'); // Cancel booking
        Route::post('/{booking}/complete', [BookingManagementController::class, 'complete'])->name('complete'); // Mark complete
        Route::get('/booking-calendar', [BookingManagementController::class, 'calendar'])->name('calendar');          // calendar page
        Route::get('/booking-calendar-data', [BookingManagementController::class, 'calendarData'])->name('calendar.data'); // JSON feed for FullCalendar
    });

});

// -----------------------------
// Customer Dashboard & Profile (auth only, no email verification)
// -----------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('customer.dashboard');
});

Route::middleware(['auth'])->prefix('customer')->name('customer.')->group(function () {
    // Profile
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Addresses
    Route::get('address', [AddressController::class, 'index'])->name('address.index');
    Route::post('address/store', [AddressController::class, 'store'])->name('address.store');
    Route::get('address/edit/{id}', [AddressController::class, 'edit'])->name('address.edit');
    Route::put('address/update/{id}', [AddressController::class, 'update'])->name('address.update');
    Route::get('address/delete/{id}', [AddressController::class, 'destroy'])->name('address.delete');

    // Pets
    Route::get('pets', [PetController::class, 'index'])->name('pets.index');
    Route::post('pets', [PetController::class, 'store'])->name('pets.store');
    Route::get('pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');
    Route::put('pets/{id}', [PetController::class, 'update'])->name('pets.update');
    Route::delete('pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy');

    //booking
     Route::get('/bookings/upcoming', [CustomerBookingController::class, 'upcoming'])->name('bookings.upcoming');
     Route::get('/bookings/past', [CustomerBookingController::class, 'past'])->name('bookings.past');
});

// -----------------------------
// Public Info Pages
// -----------------------------
Route::get('/about-us', fn() => view('about'))->name('about');
Route::get('/community', fn() => view('community'))->name('community');
Route::get('/events', fn() => view('events'))->name('events');
Route::get('/contact-us', fn() => view('contact'))->name('contact');
Route::get('/blog', fn() => view('blog'))->name('blog');
Route::get('/booking-portal', fn() => view('booking'))->name('booking');

// -----------------------------
// Public Shop
// -----------------------------
Route::get('/collections', [ShopController::class, 'index'])->name('shop.index');
Route::get('/collections/{slug}', [ShopController::class, 'category'])->name('shop.category');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/items', [CartController::class, 'items'])->name('cart.items');

// Products
Route::get('/products/{slug}', [ShopProductController::class, 'show'])->name('product.show');

// Checkout (auth only)
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/place-order', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/order/success/{id}', fn($id) => view('frontend.checkout.success', ['orderId' => $id]))->name('order.success');
});



// Public route to check availability

Route::get('/get-availability', [BookingController::class, 'getAvailability']);


// Protected routes for logged-in users
Route::middleware(['auth'])->group(function () {
    Route::get('/bookings', function() {return redirect('/'); // or any page you want
    })->name('bookings.index');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/thank-you/{id}', [BookingController::class, 'thankYou'])->name('bookings.thankyou');
});

Route::get('/user/pets', [BookingController::class, 'getUserPets'])->middleware('auth');