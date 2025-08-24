<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscribeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Main routes
Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

// Page routes
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact-us', function () {
    return view('contactus');
});
Route::get('/rent-now', function () {
    return view('rentnow');
});
Route::post('/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');



// Account route
Route::get('/my-account', function () {
    return view('my-account');
})->name('my-account');

// Authentication routes

Route::post('/login-json', [AuthController::class, 'loginJson'])->name('login.json');
Route::post('/register-json', [AuthController::class, 'registerJson'])->name('register.json');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Fallback route
Route::fallback(function () {
    return view('home');
});
// 
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
// });


Route::resource('admins',AdminDataController::class);
Route::controller(AdminDataController::class)->group(function (){
    Route::get('/admin/user','userindex')->name('useradmin.index');

});


Route::get('admin/dashboard',[BookingController::class,'dashboard'])->name('dashboard');

Route::get('/admincar',function (){
   return view('admin.car'); 
})->name('cars');


Route::get('/admin',function (){
   return view('admin.login'); 
});


Route::resource('car',CarsController::class);


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


// Existing...
Route::get('/rent-now',[BookingController::class,'index'])->name('booking.index');

// Admin (optionally protect with middleware later)
Route::get('/admin/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings.index');
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::post('/booking/store', [BookingController::class, 'store'])
    ->name('booking.store')
    ->middleware('auth');



    // Admin Booking Routes
    Route::post('/admin/bookings/{id}/approve', [BookingController::class, 'approve'])->name('bookings.approve');
    Route::post('/admin/bookings/{id}/reject', [BookingController::class, 'reject'])->name('bookings.reject');



// Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

