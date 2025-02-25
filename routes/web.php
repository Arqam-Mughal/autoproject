<?php

use App\Models\Package;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CategoryController;


// FrontEnd Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/packages', 'packageShowAll')->name('packages');
    Route::get('/buy-package/{id}', 'buyPackage')->name('buy-package');
    Route::get('/contact', 'contactFormShow')->name('contactShow');
    Route::post('/contact', 'contactForm')->name('contactSubmit');
});


// AuthController
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'showRegisterForm')->name('register');
    Route::post('register', 'register');
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('authenticate', 'login')->name('authenticate');
    Route::get('logout', 'logout')->name('logout');
    Route::any('reset-password', 'resetPassword')->name('reset-password');
    Route::any('reset-password/token/{hash}', 'passwordUpdate')->name('password-update');
});


// User Dashboard Routes

Route::prefix('user')->group(function () {

    Route::get('/dashboard', function () {
        if(Auth::check() && Auth::user()->role==0){

            return view('user.index');
        }
        return redirect()->route('login');
    })->name('user.index');

    Route::get('profile', function () {
        return view('user.profile');
    })->name('user.profile');

    Route::get('team',[TeamController::class, 'teamShow'])->name('user.team');

    Route::get('withdrawls', function () {
        return view('user.withdrawls');
    })->name('user.withdrawls');

    Route::get('bank-details', function () {
        return view('user.bank-details');
    })->name('user.bank-details');
});

// Admin  Dashboard Routes

Route::prefix('admin')->group(function () {

    Route::get('dashboard', function () {
        if(Auth::check() && Auth::user()->role == 1){
            return view('admin.index');
        }
        return redirect()->route('admin.login');    // --
    })->name('admin.index');

    Route::get('login', function () {
        if(Auth::check() && Auth::user()->role == 1){
            return redirect()->route('admin.index');
        }elseif(Auth::check() && Auth::user()->role == 0){
            return redirect()->route('home');
        }

        return view('login');
    })->name('admin.login');

    Route::get('reset-password', function () {
        return view('admin.reset-password');
    })->name('admin.reset-password');

    Route::get('profile', function () {
        return view('admin.profile');
    })->name('admin.profile');


    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('admin.users');
        Route::get('users/create', 'create')->name('admin.create_user');
        Route::get('users/{$id}/edit', 'edit')->name('admin.edit_user');
        Route::delete('users/{id}/delete', 'destroy')->name('admin.destroy_user');
        Route::get('users/{id}', 'updateStatus')->name('user.updateStatus');
    });

    Route::get('withdrawls', function () {
        return view('admin.withdrawls');
    })->name('admin.withdrawls');

    Route::get('bank-details', function () {
        return view('admin.bank-details');
    })->name('admin.bank-details');

    Route::resource('category', CategoryController::class);
    Route::resource('packages', PackageController::class);
});
