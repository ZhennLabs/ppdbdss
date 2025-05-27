<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

// Rute untuk autentikasi (tanpa login)
Route::middleware(['guest'])->group(function () {
    Route::get('/signup', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/signup', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Rute untuk logout (harus login)
Route::post('/logout/user', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Rute untuk form pendaftaran PPDB (hanya untuk user yang sudah login)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/register', [StudentController::class, 'create'])->name('students.create');
    Route::post('/register', [StudentController::class, 'store'])->name('students.store');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');