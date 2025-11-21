<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Products
    Route::resource('products', ProductController::class);

    // Stock Management
    Route::resource('stock-ins', StockInController::class);
    Route::resource('stock-outs', StockOutController::class);

    // Reports
    Route::get('/reports/stock', [ReportController::class, 'stockReport'])->name('reports.stock');
    Route::get('/reports/movement', [ReportController::class, 'movementReport'])->name('reports.movement');
    Route::get('/reports/low-stock', [ReportController::class, 'lowStockReport'])->name('reports.low-stock');
});

// Admin only routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    // Categories
    Route::resource('categories', CategoryController::class);
});