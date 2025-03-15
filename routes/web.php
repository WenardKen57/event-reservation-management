<?php


use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])
->name('superadmin.dashboard')
->middleware(['auth', 'role:super_admin']);

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
->name('admin.dashboard')
->middleware(['auth', 'role:admin']);

Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])
->name('customer.dashboard')
->middleware(['auth', 'role:customer']);

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
