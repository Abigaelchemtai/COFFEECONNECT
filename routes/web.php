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

//farmers
Route::get('/farmer-dashboard', [FarmersDashboardController::class, 'farmers'])->name('farmer.dashboard');

// Investor Dashboard
Route::get('/investor-dashboard', function () {
    return view('pages.investors'); // Ensure this view exists in resources/views/pages/investors.blade.php
})->name('investor.dashboard');

// Account Page (Only for Authenticated Users)
Route::get('/account', function () {
    return Auth::check() ? view('pages.account') : redirect()->route('login');
})->name('account');