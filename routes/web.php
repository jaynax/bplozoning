<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CertificateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// User Routes
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

// Certificate Routes
Route::prefix('certificate')->middleware('auth')->group(function () {
    Route::get('/create', [CertificateController::class, 'createForm'])->name('certificate.create');
    Route::get('/business/form', [CertificateController::class, 'showBusinessForm'])->name('certificate.business.form');
    Route::get('/residential/form', [CertificateController::class, 'showResidentialForm'])->name('certificate.residential.form');
    Route::post('/business/generate', [CertificateController::class, 'generateBusiness'])->name('certificate.business.generate');
    Route::post('/residential/generate', [CertificateController::class, 'generateResidential'])->name('certificate.residential.generate');
});
