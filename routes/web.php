<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificateDesignController;

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
    Route::get('/', [CertificateController::class, 'index'])->name('certificate.index');
    Route::get('/create', [CertificateController::class, 'createForm'])->name('certificate.create');
    Route::get('/{certificate}', [CertificateController::class, 'show'])->name('certificate.show');
    Route::get('/{certificate}/download', [CertificateController::class, 'download'])->name('certificate.download');
    Route::delete('/{certificate}', [CertificateController::class, 'destroy'])->name('certificate.delete');
    Route::get('/business/form', [CertificateController::class, 'showBusinessForm'])->name('certificate.business.form');
    Route::get('/residential/form', [CertificateController::class, 'showResidentialForm'])->name('certificate.residential.form');
    Route::get('/landuse/form', [CertificateController::class, 'showLandUseForm'])->name('certificate.landuse.form');
    Route::get('/building/form', [CertificateController::class, 'showBuildingForm'])->name('certificate.building.form');
    Route::get('/compliance/form', [CertificateController::class, 'showComplianceForm'])->name('certificate.compliance.form');
    Route::get('/environmental/form', [CertificateController::class, 'showEnvironmentalForm'])->name('certificate.environmental.form');
    Route::post('/business/generate', [CertificateController::class, 'generateBusiness'])->name('certificate.business.generate');
    Route::post('/residential/generate', [CertificateController::class, 'generateResidential'])->name('certificate.residential.generate');
    Route::post('/landuse/generate', [CertificateController::class, 'generateLandUse'])->name('certificate.landuse.generate');
    Route::post('/building/generate', [CertificateController::class, 'generateBuilding'])->name('certificate.building.generate');
    Route::post('/compliance/generate', [CertificateController::class, 'generateCompliance'])->name('certificate.compliance.generate');
    Route::post('/environmental/generate', [CertificateController::class, 'generateEnvironmental'])->name('certificate.environmental.generate');
});

// Certificate Design Routes
Route::prefix('certificate-designs')->middleware('auth')->group(function () {
    Route::get('/', [CertificateDesignController::class, 'index'])->name('certificate-designs.index');
    Route::get('/categories', [CertificateDesignController::class, 'categories'])->name('certificate-designs.categories');
    Route::get('/category/{category}', [CertificateDesignController::class, 'byCategory'])->name('certificate-designs.byCategory');
    Route::get('/{slug}', [CertificateDesignController::class, 'show'])->name('certificate-designs.show');
    Route::post('/', [CertificateDesignController::class, 'store'])->name('certificate-designs.store');
    Route::put('/{certificateDesign}', [CertificateDesignController::class, 'update'])->name('certificate-designs.update');
    Route::delete('/{certificateDesign}', [CertificateDesignController::class, 'destroy'])->name('certificate-designs.destroy');
});
