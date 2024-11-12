<?php

use App\Models\vehicle;
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
use App\Http\Controllers\AdminInputVehicleController;

use App\Http\Controllers\VendorDashController;

Route::get('/', function () {
    return view('welcome');
});

//buat login
Route::get('/login', [LoginController::class, 'showlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::middleware(['auth', 'admin'])->get('/admin_dashboard', [AdminDashController::class, 'showadmindash'])->name('admin_dashboard');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirect ke halaman login setelah logout
})->name('logout');


Route::get('/admin_dashboard', [AdminDashController::class, 'showadmindash'])->name('admin_dashboard');

Route::get('/admin_offering', [AdminOfferingController::class, 'showadminoff'])->name('admin_offering');

Route::get('/admin_vendorselection', [AdminVendorSelectionController::class, 'showvendorselection'])->name('admin_vendorselection');

Route::get('/admin_negotiate', [AdminNegotiateController::class, 'shownegotiate'])->name('admin_negotiate');

Route::get('/admin_tendercontrol', [AdminTenderController::class, 'showtendercontrol'])->name('admin_tendercontrol');

Route::get('/admin_maketender', [AdminMakeTenderController::class, 'showtender'])->name('admin_maketender');

Route::get('/admin_makedriver', [AdminMakeDriverController::class, 'showdriver'])->name('admin_makedriver');

Route::get('/admin_vehicles', [AdminVehiclesController::class, 'showvehiclescontroller'])->name('admin_vehicles');
Route::get('/vehicle/{vehicle_id}/details', [AdminVehiclesController::class, 'getDetails'])->name('vehicle_details');


Route::get('/admin_complainlist', [AdminComplainListController::class, 'showcomplaincontroller'])->name('admin_complainlist');

Route::get('/admin_inputvehicle', [AdminInputVehicleController::class, 'showinputvehicle'])->name('admin_inputvehicle');
Route::post('/admin_inputvehicle', [AdminInputVehicleController::class, 'StoreData'])->name('admin_storevehicle');
Route::get('/admin_inputvehicle/edit/{vehicle_id}', [AdminInputVehicleController::class, 'showEditForm'])->name('admin_showeditvehicle');
Route::put('/admin_inputvehicle/edit/{vehicle_id}', [AdminInputVehicleController::class, 'EditData'])->name('admin_editinputvehicle');
Route::delete('/admin_inputvehicle/{vehicle_id}', [AdminInputVehicleController::class, 'DeleteData'])->name('admin_editdeletevehicle');



Route::get('vendor_dashboard', [VendorDashController::class, 'showvendordash'])->name('vendor_dahsboard');

