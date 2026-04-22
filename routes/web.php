<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificateDesignController;
use App\Http\Controllers\ApiController;

// Include debug routes
require __DIR__.'/debug.php';

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

Route::get('/debug-routes', function () {
    $routes = app('router')->getRoutes();
    $certificateRoutes = [];
    
    foreach ($routes as $route) {
        if (strpos($route->getName(), 'certificate.') === 0) {
            $certificateRoutes[] = [
                'name' => $route->getName(),
                'uri' => $route->uri(),
                'methods' => implode(', ', $route->methods())
            ];
        }
    }
    
    return response()->json($certificateRoutes);
});

Route::get('/basic-test', function() {
    return 'Basic routing works!';
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
    Route::get('/reports', [UserController::class, 'reports'])->name('user.reports');
    Route::get('/reports/export', [UserController::class, 'exportReports'])->name('user.reports.export');
    Route::get('/reports/export-pdf', [UserController::class, 'exportPdf'])->name('user.reports.export.pdf');
    Route::get('/reports/export-word', [UserController::class, 'exportWord'])->name('user.reports.export.word');
    Route::get('/zoning-map', [UserController::class, 'zoningMap'])->name('user.zoning-map');
});

// Certificate Routes
Route::prefix('certificate')->middleware('auth')->group(function () {
    Route::get('/', [CertificateController::class, 'index'])->name('certificate.index');
    Route::get('/create', [CertificateController::class, 'createForm'])->name('certificate.create');
    Route::get('/business/form', [CertificateController::class, 'showBusinessForm'])->name('certificate.business.form');
    Route::get('/residential/form', [CertificateController::class, 'showResidentialForm'])->name('certificate.residential.form');
    Route::get('/landuse/form', [CertificateController::class, 'showLandUseForm'])->name('certificate.landuse.form');
    Route::get('/building/form', [CertificateController::class, 'showBuildingForm'])->name('certificate.building.form');
    Route::get('/compliance/form', [CertificateController::class, 'showComplianceForm'])->name('certificate.compliance.form');
    Route::get('/environmental/form', [CertificateController::class, 'showEnvironmentalForm'])->name('certificate.environmental.form');
    Route::get('/locational-clearance/form', [CertificateController::class, 'showLocationalClearanceForm'])->name('certificate.locational-clearance.form');
    Route::get('/locational-clearance/design', [CertificateController::class, 'selectLocationalClearanceDesign'])->name('certificate.locational-clearance.design');
    Route::post('/locational-clearance/design-selected', [CertificateController::class, 'designSelected'])->name('certificate.locational-clearance.design-selected');
    Route::match(['get', 'post'], '/locational-clearance/edit', [CertificateController::class, 'editLocationalClearance'])->name('certificate.locational-clearance.edit');
    Route::post('/locational-clearance/save', [CertificateController::class, 'saveLocationalClearance'])->name('certificate.locational-clearance.save');
    Route::post('/locational-clearance/auto-save', [CertificateController::class, 'autoSaveLocationalClearance'])->name('certificate.locational-clearance.auto-save');
    Route::post('/business/generate', [CertificateController::class, 'generateBusiness'])->name('certificate.business.generate');
    Route::post('/residential/generate', [CertificateController::class, 'generateResidential'])->name('certificate.residential.generate');
    Route::post('/landuse/generate', [CertificateController::class, 'generateLandUse'])->name('certificate.landuse.generate');
    Route::post('/building/generate', [CertificateController::class, 'generateBuilding'])->name('certificate.building.generate');
    Route::post('/compliance/generate', [CertificateController::class, 'generateCompliance'])->name('certificate.compliance.generate');
    Route::post('/environmental/generate', [CertificateController::class, 'generateEnvironmental'])->name('certificate.environmental.generate');
    Route::post('/locational-clearance/generate', [CertificateController::class, 'generateLocationalClearance'])->name('certificate.locational-clearance.generate');
    Route::post('/bulk-delete', [CertificateController::class, 'bulkDelete'])->name('certificate.bulkDelete');
    Route::get('/simple-test', function() {
        return 'Simple test route works!';
    });
    
    // Parameterized routes must come after specific routes
    Route::get('/{certificate}', [CertificateController::class, 'show'])->name('certificate.show');
    Route::get('/{certificate}/edit', [CertificateController::class, 'edit'])->name('certificate.edit');
    Route::put('/{certificate}', [CertificateController::class, 'update'])->name('certificate.update');
    Route::get('/{certificate}/preview', [CertificateController::class, 'preview'])->name('certificate.preview');
    Route::get('/{certificate}/download', [CertificateController::class, 'download'])->name('certificate.download');
    Route::delete('/{certificate}', [CertificateController::class, 'destroy'])->name('certificate.delete');
});

// API Routes
Route::prefix('api')->group(function () {
    Route::get('/borders', [ApiController::class, 'getBorders'])->name('api.borders');
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
