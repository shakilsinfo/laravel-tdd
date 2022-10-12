<?php

use App\Http\Controllers as Dir;
use App\Http\Livewire as livewireComponent;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Vendors\VendorListController;
use App\Http\Controllers\Vendors\VendorOwnerController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/', [Dir\HomeController::class, 'index'])->name('home');
    Route::resource('settings', Dir\Backend\SettingsController::class);
    Route::prefix('vehicles')->group(function () {
        Route::resource('routes', Dir\Vehicles\RouteController::class);
        Route::resource('vehicles', Dir\Vehicles\VehiclesController::class);
    });
    Route::resource('vendors', VendorListController::class);
    Route::resource('vendor-owners', VendorOwnerController::class);
});
