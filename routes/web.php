<?php

// namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnerController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('learner.login');
});

Route::get('/register/learner', [LearnerController::class, 'showRegistrationForm'])->name('learner.register');
Route::post('/register/learner', [LearnerController::class, 'register'])->name('learner.register.submit');
Route::get('/login/learner', [LearnerController::class, 'showLoginForm'])->name('learner.login');
Route::post('/login/learner', [LearnerController::class, 'login'])->name('learner.login.submit');

Route::get('/login/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login/admin', [AdminController::class, 'login'])->name('admin.login.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/learner/welcome', [LearnerController::class, 'welcome'])->name('learner.welcome');
    Route::post('/logout', [LearnerController::class, 'logout'])->name('logout');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout/admin', [AdminController::class, 'logout'])->name('logout.admin');

});
