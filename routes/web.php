<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CriterionController;
use App\Http\Controllers\ScoreController;

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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Rute untuk form pendaftaran PPDB (hanya untuk user yang sudah login)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/register', [StudentController::class, 'create'])->name('students.create');
    Route::post('/register', [StudentController::class, 'store'])->name('students.store');
});

// Rute untuk halaman admin (hanya untuk admin yang sudah login)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/student', [AdminController::class, 'studentCreate'])->name('students.create');
    Route::get('/admin/master', [AdminController::class, 'masterData'])->name('master-data.index');
    Route::put('/admin/result/{id}/update-status', [\App\Http\Controllers\AdminController::class, 'updateResultStatus'])->name('admin.result.updateStatus');
});

// Halaman statis
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/students/registration/success', [StudentController::class, 'registrationSuccess'])->name('students.registration.success');
Route::get('/students/{student}/pdf', [\App\Http\Controllers\StudentController::class, 'downloadPdf'])->name('students.pdf');
Route::get('/cek-status', function () {
    return view('students.cek-status');
})->name('cek.status');

Route::post('/cek-status', [App\Http\Controllers\StatusController::class, 'check'])->name('cek.status.submit');
Route::resource('criteria', \App\Http\Controllers\CriterionController::class);
Route::resource('scores', \App\Http\Controllers\ScoreController::class);