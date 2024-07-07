<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminTypeController;
use App\Http\Controllers\Admin\AdminInventoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminScheduleController;
use App\Http\Controllers\Client\ClientCartController;
use App\Http\Controllers\Client\ClientBookingController;
use App\Http\Controllers\Client\ClientProductController;
use App\Http\Controllers\Client\ClientScheduleController;


// CLIENT SIDE
Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/category/{id}', [HomeController::class, 'show'])->name('beranda.detail');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/product', [ClientProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ClientProductController::class, 'show'])->name('product.show');
Route::get('/schedule', [ClientScheduleController::class, 'index'])->name('schedule.index');
Route::get('/schedule/{id}', [ClientScheduleController::class, 'show'])->name('schedule.show');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Auth::routes([
  'reset' => false,
  'verify' => false,
  'confirm' => false,
  'logout' => false
]);

Route::post('/register', [RegisterController::class, 'create'])->name('regist');

Route::middleware(['auth'])->group(function () {

  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
  Route::post('/product/store', [ClientProductController::class, 'cart'])->name('product.store');
  Route::get('/cart', [ClientCartController::class, 'index'])->name('cart');
  Route::get('/cart/{id}', [ClientCartController::class, 'update'])->name('cart.update');
  Route::delete('/cart/{id}/destroy', [ClientCartController::class, 'destroy'])->name('cart.destroy');
  Route::get('/booking', [ClientBookingController::class, 'index'])->name('booking');
  Route::get('/booking/{id}', [ClientBookingController::class, 'show'])->name('booking.show');

  // Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

  // CMS ADMINITRASTOR
  Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('beranda');
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CRUD USER
    Route::get('/user', [AdminUserController::class, 'index'])->name('user.index');
    Route::post('/user', [AdminUserController::class, 'store'])->name('user.store');
    Route::put('/user/{id}/update', [AdminUserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/destroy', [AdminUserController::class, 'destroy'])->name('user.destroy');

    // CRUD CATEGORY
    Route::get('/category', [AdminCategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::put('/category/{id}/update', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}/destroy', [AdminCategoryController::class, 'destroy'])->name('category.destroy');

    // CRUD TYPE
    Route::get('/type', [AdminTypeController::class, 'index'])->name('type.index');
    Route::post('/type', [AdminTypeController::class, 'store'])->name('type.store');
    Route::put('/type/{id}/update', [AdminTypeController::class, 'update'])->name('type.update');
    Route::delete('/type/{id}/destroy', [AdminTypeController::class, 'destroy'])->name('type.destroy');

    // CRUD INVENTORY
    Route::get('/inventory', [AdminInventoryController::class, 'index'])->name('inventory.index');
    Route::post('/inventory', [AdminInventoryController::class, 'store'])->name('inventory.store');
    Route::put('/inventory/{id}/update', [AdminInventoryController::class, 'update'])->name('inventory.update');
    Route::delete('/inventory/{id}/destroy', [AdminInventoryController::class, 'destroy'])->name('inventory.destroy');

    // CRUD PRODUCT
    Route::get('/product', [AdminProductController::class, 'index'])->name('product.index');
    Route::post('/product', [AdminProductController::class, 'store'])->name('product.store');
    Route::put('/product/{id}/update', [AdminProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}/destroy', [AdminProductController::class, 'destroy'])->name('product.destroy');

    // CRUD BOOKING
    Route::get('/booking', [AdminBookingController::class, 'index'])->name('booking.index');
    Route::post('/booking', [AdminBookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{id}', [AdminBookingController::class, 'edit'])->name('booking.edit');
    Route::put('/booking/{id}/update', [AdminBookingController::class, 'update'])->name('booking.update');
    Route::delete('/booking/{id}/destroy', [AdminBookingController::class, 'destroy'])->name('booking.destroy');

    // CRUD SCHEDULE
    Route::get('/schedule', [AdminScheduleController::class, 'index'])->name('schedule.index');
    Route::post('/schedule', [AdminScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/schedule/{id}', [AdminScheduleController::class, 'edit'])->name('schedule.edit');
    Route::put('/schedule/{id}/update', [AdminScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/schedule/{id}/destroy', [AdminScheduleController::class, 'destroy'])->name('schedule.destroy');
  });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
