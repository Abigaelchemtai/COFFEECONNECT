<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

// Route::get('/', function () {
//     return view('pages.home');
// });

Route::get('/app', function () {
    return view('layouts.app');
});



//Login profile
Route::get("/login", [CustomAuthController::class, 'login'])->name('login');
//Signout profile
Route::get("/signup", [CustomAuthController::class, 'signup'])->name('signup');
// Logout route
Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::post('/register-user',[CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('login-user',[CustomAuthController::class, 'loginUser'])->name('login-user');

Route::get('/farmer-dashboard', function () {
    return view('pages.farmers');
})->name('farmer.dashboard');

Route::get('/investor-dashboard', function () {
    return view('pages.investors');
})->name('investor.dashboard');

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to the homepage or login page
})->name('logout');

Route::get('/account', function () {
    if (Auth::check()) {
        return view('pages.account');
    } else {
        return redirect()->route('login'); // Redirect to login if not authenticated
    }
})->name('account');