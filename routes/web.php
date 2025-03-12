<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CoffeeListingsController;
use App\Http\Controllers\FarmersDashboardController;
use Illuminate\Support\Facades\Auth;

// Home Page
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Layout Route (For Testing)
Route::get('/app', function () {
    return view('layouts.app');
});

// Authentication Routes
Route::get("/login", [CustomAuthController::class, 'login'])->name('login');
Route::get("/signup", [CustomAuthController::class, 'signup'])->name('signup');
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');

// Dashboard Navigation
Route::get('/farmer', function () {
    return view('layouts.nav'); // Ensure this view exists in resources/views/layouts/nav.blade.php
})->name('farmer.nav');

Route::middleware(['auth'])->group(function () {
    // 📌 Farmers Dashboard
    Route::get('/farmer-dashboard', [FarmersDashboardController::class, 'dashboard'])->name('farmer.dashboard');

    // ☕ Coffee Listings
    Route::prefix('farmers')->group(function () {
        Route::get('/farmer/listings', [FarmersDashboardController::class, 'coffeeListings'])->name('pages.farmers');
        Route::get('/create', [FarmersDashboardController::class, 'createCoffee'])->name('farmer.create');
        Route::post('/farmer/store-coffee', [FarmersDashboardController::class, 'storeCoffee'])->name('farmer.storeCoffee');
        Route::get('/farmer/edit-coffee/{id}', [FarmersDashboardController::class, 'editCoffee'])->name('farmer.editCoffee');
        Route::patch('/farmer/update-coffee/{id}', [FarmersDashboardController::class, 'updateCoffee'])->name('farmer.updateCoffee');

      });
});

// Investor Dashboard
Route::get('/investor-dashboard', function () {
    return view('pages.investors'); // Ensure this view exists in resources/views/pages/investors.blade.php
})->name('investor.dashboard');

// Account Page (Only for Authenticated Users)
Route::get('/account', function () {
    return Auth::check() ? view('pages.account') : redirect()->route('login');
})->name('account');