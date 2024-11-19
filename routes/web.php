<?php

use App\Models\vehicle;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;


use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\AdminOfferingController;
use App\Http\Controllers\AdminShowOfferingController;
use App\Http\Controllers\AdminVendorSelectionController;
use App\Http\Controllers\AdminNegotiateController;
use App\Http\Controllers\AdminTenderController;
use App\Http\Controllers\AdminMakeTenderController;
use App\Http\Controllers\AdminMakeDriverController;
use App\Http\Controllers\AdminVehiclesController;
use App\Http\Controllers\AdminComplainListController;
use App\Http\Controllers\AdminInputVehicleController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\VendorDashController;

Route::get('/', function () {
    return view('welcome');
});

//buat login
Route::get(uri: '/login', action: [LoginController::class, 'showlogin'])->name('login');
Route::post('/login', action: [LoginController::class, 'login'])->name('login.submit');
Route::middleware(['auth', 'admin'])->get('/admin_dashboard', [AdminDashController::class, 'showadmindash'])->name('admin_dashboard');
Route::post('/logout', action: function () {
    Auth::logout();
    return redirect('/login'); // Redirect ke halaman login setelah logout
})->name('logout');

//register
Route::get('/register', action: [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', action: [RegisterController::class, 'register'])->name('register_submit');

//dashboard
Route::get('/admin_dashboard', [AdminDashController::class, 'showadmindash'])->name('admin_dashboard');


//tawaran
Route::get('/admin_showoffering', [AdminOfferingController::class, 'showoffering'])->name('admin_showoffering');

Route::get('/admin_offering', [AdminOfferingController::class, 'showadminoff'])->name('admin_offering');
Route::post('/admin_offering', [AdminOfferingController::class, 'StoreData'])->name('admin_storeoffering');
Route::get('/item/{item_id}/details', [AdminShowOfferingController::class, 'getDetails'])->name('item_details');
Route::get('/admin_editoffering/{item_id}', [AdminOfferingController::class, 'EditOffering'])->name('admin_editoffering');
Route::put('/admin_offering/{item_id}', [AdminOfferingController::class, 'EditData'])->name('admin_updateoffering');
Route::delete('/admin_offering/{item_id}', [AdminOfferingController::class, 'DeleteData'])->name('admin_deleteitem');


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

