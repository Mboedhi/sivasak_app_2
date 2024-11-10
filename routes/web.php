<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;


use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\AdminOfferingController;
use App\Http\Controllers\AdminVendorSelectionController;
use App\Http\Controllers\AdminNegotiateController;
use App\Http\Controllers\AdminTenderController;
use App\Http\Controllers\AdminMakeTenderController;
use App\Http\Controllers\AdminMakeDriverController;
use App\Http\Controllers\AdminVehiclesController;
use App\Http\Controllers\AdminComplainListController;

use App\Http\Controllers\VendorDashController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showlogin'])->name('login');
Route::get('/logout', [LogoutController::class, 'showlogout'])->name('logout');


Route::get('/admin_dashboard', [AdminDashController::class, 'showadmindash'])->name('admin_dashboard');

Route::get('/admin_offering', [AdminOfferingController::class, 'showadminoff'])->name('admin_offering');

Route::get('/admin_vendorselection', [AdminVendorSelectionController::class, 'showvendorselection'])->name('admin_vendorselection');

Route::get('/admin_negotiate', [AdminNegotiateController::class, 'shownegotiate'])->name('admin_negotiate');

Route::get('/admin_tendercontrol', [AdminTenderController::class, 'showtendercontrol'])->name('admin_tendercontrol');


Route::get('/admin_maketender', [AdminMakeTenderController::class, 'showtender'])->name('admin_maketender');

Route::get('/admin_makedriver', [AdminMakeDriverController::class, 'showdriver'])->name('admin_makedriver');

Route::get('/admin_vehicles', [AdminVehiclesController::class, 'showvehiclescontroller'])->name('admin_vehicles');

Route::get('/admin_complainlist', [AdminComplainListController::class, 'showcomplaincontroller'])->name('admin_complainlist');


Route::get('vendor_dashboard', [VendorDashController::class, 'showvendordash'])->name('vendor_dahsboard');

