<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CriterionController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\StatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Kelompokkan berdasarkan fitur: umum, auth, user, admin, statis, resource
*/

// =====================
// ROUTE UMUM
// =====================
Route::get('/', fn() => redirect()->route('home'));
Route::get('/home', fn() => view('home'))->name('home');

// =====================
// ROUTE AUTENTIKASI
// =====================
Route::middleware(['guest'])->group(function () {
    Route::get('/signup', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/signup', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// =====================
// ROUTE USER (SISWA)
// =====================
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/register', [StudentController::class, 'create'])->name('students.create');
    Route::post('/register', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/registration/success', [StudentController::class, 'registrationSuccess'])->name('students.registration.success');
    Route::get('/students/{student}/pdf', [StudentController::class, 'downloadPdf'])->name('students.pdf');
});

// =====================
// ROUTE ADMIN
// =====================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/master', [AdminController::class, 'masterData'])->name('master-data.index');
    Route::put('/admin/result/{id}/update-status', [AdminController::class, 'updateResultStatus'])->name('admin.result.updateStatus');
});

// =====================
// ROUTE CEK STATUS
// =====================
Route::get('/cek-status', fn() => view('students.cek-status'))->name('cek.status');
Route::post('/cek-status', [StatusController::class, 'check'])->name('cek.status.submit');

// =====================
// ROUTE HALAMAN STATIS
// =====================
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');

// =====================
// ROUTE RESOURCE (CRUD ADMIN)
// =====================
// Route::resource('criteria', CriterionController::class);
// Route::resource('scores', ScoreController::class);

// routes/web.php
Route::prefix('admin')->group(function() {
    // Kriteria
    Route::resource('criteria', CriterionController::class);
    
    // Nilai
    Route::resource('scores', ScoreController::class);
    
    // Kelulusan
    Route::post('results/{result}/update-status', 'ResultController@updateStatus')
         ->name('admin.result.updateStatus');
});