<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::resource('menus', MenuController::class);
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;


Route::get('/order', [MenuController::class, 'order'])->name('order');

// Admin routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.submit');

// User routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [UserController::class, 'login'])->name('user.login.submit');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('user.register');
Route::post('/register', [UserController::class, 'register'])->name('user.register.submit');

// Admin protected routes
Route::middleware(['auth:admin'])->group(function () {
Route::resource('menus', MenuController::class);
Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::put('/admin/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
// Route untuk melihat pesanan yang di-approve
Route::get('/admin/orders/approved', [OrderController::class, 'approvedOrders'])->name('admin.orders.approved');

        
});
Route::middleware(['auth'])->group(function () {
    Route::get('/order', [MenuController::class, 'order'])->name('order');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    // Route::get('/order', [OrderController::class, 'create'])->name('order.create');


});

Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

// // Rute untuk halaman pemesanan
// Route::middleware(['auth'])->group(function () {
//     Route::get('/order', [OrderController::class, 'create'])->name('order.create');
//     Route::post('/order', [OrderController::class, 'store'])->name('order.store');
// });

// Rute untuk halaman admin
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
//     Route::put('/admin/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
// });

