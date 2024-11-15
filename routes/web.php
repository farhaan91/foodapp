<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;  

// Home route
Route::get('/', function () {
    return view('home');
});

// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Profile routes (middleware for authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin dashboard route
Route::get('/admin-dashboard', function () {
    return view('dash');
})->name('admin-dashboard');

// Booking routes
Route::post('/booking', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/admin-dashboard', [BookingController::class, 'index'])->name('dash');










// Additional authenticated routes (optional)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
