<?php
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RentalController;

Route::get('/', function () {
    return view('homepage');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');
    Route::post('{reservation}/approve', [AdminController::class, 'approve'])
    ->name('reservation.approve');
    Route::post('{reservation}/disapprove', [AdminController::class, 'disapprove'])
    ->name('reservation.disapprove');
});

Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])
    ->name('superadmin.dashboard');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])
    ->name('customer.dashboard');

    Route::get('/make-reservation', [CustomerController::class, 'make_reservation'])
    ->name('customer.make_reservation');

    Route::post('/store-reservation', [CustomerController::class, 'store_reservation'])
    ->name('customer.store_reservation');

    Route::get('/rentals', [RentalController::class, 'index'])
    ->name('customer.rentals.index');

    Route::post('/rentals', [RentalController::class, 'store'])
    ->name('customer.rentals.store');

    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
