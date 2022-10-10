<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Users\Admin\{
    DashboardController as AdminDashboardController,
};

use App\Http\Controllers\Users\Patient\{
    DashboardController as PatientDashboardController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("administrator")->group(function () {
    Route::middleware('role:administrator')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });
});

Route::prefix("patient")->group(function () {
    Route::middleware('role:patient')->group(function () {
        Route::get('dashboard', [PatientDashboardController::class, 'index'])->name('patient.dashboard');
    });
});