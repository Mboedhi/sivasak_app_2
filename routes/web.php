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
use App\Http\Controllers\AdminMakeDriverAccController;
use App\Http\Controllers\AdminVendorListController;
use App\Http\Controllers\AdminQuesionerController;


use App\Http\Controllers\VendorOfferListController;
use App\Http\Controllers\VendorDashController;
use App\Http\Controllers\VendorRegisterController;
use App\Http\Controllers\VendorNegotiateController;
use App\Http\Controllers\VendorNegotiateDetailController;
use App\Http\Controllers\VendorQuesionerController;

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

//questioner
Route::get('/admin_questionaire', [AdminQuesionerController::class, 'index'])->name('admin_daftarquestioner');
Route::get('/admin_questionaire/{id}', [AdminQuesionerController::class, 'show'])->name('admin_detailquestioner');

//tawaran
Route::get('/admin_showoffering', [AdminOfferingController::class, 'showoffering'])->name('admin_showoffering');

Route::get('/admin_offering', [AdminOfferingController::class, 'showadminoff'])->name('admin_offering');
Route::post('/admin_offering', [AdminOfferingController::class, 'StoreData'])->name('admin_storeoffering');
Route::get('/item/{item_id}/details', [AdminShowOfferingController::class, 'getDetails'])->name('item_details');
Route::get('/admin_editoffering/{item_id}', [AdminOfferingController::class, 'EditOffering'])->name('admin_editoffering');
Route::put('/admin_offering/{item_id}', [AdminOfferingController::class, 'EditData'])->name('admin_updateoffering');
Route::delete('/admin_offering/{item_id}', [AdminOfferingController::class, 'DeleteData'])->name('admin_deleteitem');

//seleksi vendor
Route::get('/admin_vendorselection', [AdminVendorSelectionController::class, 'showvendorselection'])->name('admin_vendorselection');
Route::post('/admin_vendorselection/accept/{vendor_id}', [AdminVendorSelectionController::class, 'acceptVendor'])->name('accept_vendor');
Route::post('/admin_vendorselection/reject/{vendor_id}', [AdminVendorSelectionController::class, 'rejectVendor'])->name('reject_vendor');

//negosiasi
Route::get('/admin_negotiate', [AdminNegotiateController::class, 'shownegotiate'])->name('admin_negotiate');

Route::get('/admin_tendercontrol', [AdminTenderController::class, 'showtendercontrol'])->name('admin_tendercontrol');

Route::get('/admin_maketender', [AdminMakeTenderController::class, 'showtender'])->name('admin_maketender');

//list vendor
Route::get('/admin_vendor_list', [AdminVendorListController::class, 'showvendor'])->name('admin_vendor_list');
Route::get('/vendor/{vendor_id}/details', [AdminVendorListController::class, 'getDetails'])->name('vendor_details');

//akun driver
Route::get('/admin_makedriver', [AdminMakeDriverController::class, 'showdriver'])->name('admin_makedriver');
Route::get('/admin_makedriveracc', [AdminMakeDriverAccController::class, 'showdriveracc'])->name('admin_makedriveracc');
Route::post('/admin_makedriveracc', [AdminMakeDriverAccController::class, 'register'])->name('driver_register');
Route::get('/user/{user_id}/details', [AdminMakeDriverController::class, 'getDriver'])->name('driver_details');
Route::delete('/user/{user_id}', [AdminMakeDriverController::class, 'deleteDriver'])->name('delete_driver');
Route::get('/admin_makedriveracc/edit/{user_id}', [AdminMakeDriverAccController::class, 'showeditDriver'])->name('admin_showeditinputdriveracc');
Route::put('/admin_makedriveracc/edit/{user_id}', [AdminMakeDriverAccController::class, 'editDriver'])->name('admin_editinputdriveracc');

//kendaraan
Route::get('/admin_vehicles', [AdminVehiclesController::class, 'showvehiclescontroller'])->name('admin_vehicles');
Route::get('/vehicle/{vehicle_id}/details', [AdminVehiclesController::class, 'getDetails'])->name('vehicle_details');

//input kendaraan
Route::get('/admin_complainlist', [AdminComplainListController::class, 'showcomplaincontroller'])->name('admin_complainlist');

Route::get('/admin_inputvehicle', [AdminInputVehicleController::class, 'showinputvehicle'])->name('admin_inputvehicle');
Route::post('/admin_inputvehicle', [AdminInputVehicleController::class, 'StoreData'])->name('admin_storevehicle');
Route::get('/admin_inputvehicle/edit/{vehicle_id}', [AdminInputVehicleController::class, 'showEditForm'])->name('admin_showeditvehicle');
Route::put('/admin_inputvehicle/edit/{vehicle_id}', [AdminInputVehicleController::class, 'EditData'])->name('admin_editinputvehicle');
Route::delete('/admin_inputvehicle/{vehicle_id}', [AdminInputVehicleController::class, 'DeleteData'])->name('admin_editdeletevehicle');



Route::middleware(['auth'])->get('vendor_dashboard', [VendorDashController::class, 'showvendordash'])->name('vendor_dahsboard');

//offering
Route::get('vendor_offer_list', [VendorOfferListController::class, 'showofferlist'])->name('vendor_offer_list');
Route::post('vendor_offer_list/submit', [VendorOfferListController::class, 'storeassessment'])->name('vendor_store_offer');

//tambah data vendor
Route::get('vendor_register', [VendorRegisterController::class, 'showregister'])->name('vendor_register');
Route::post('vendor_register', [VendorRegisterController::class, 'register'])
    ->middleware('auth')
    ->name('vendor_register_submit');

//negosiasi
Route::middleware(['auth'])->get('/vendor_negotiate', [VendorNegotiateController::class, 'show_vendornegotiate'])->name('vendor_negotiate');
Route::get('vendor_negotiate_detail', [VendorNegotiateDetailController::class, 'show_vendornegotiatedetail'])->name('vendor_negotiate_detail');

Route::get('/vendor_negotiate_detail/{assessment_id}', [VendorNegotiateDetailController::class, 'show_vendornegotiatedetail'])->name('vendor_negotiate_detail');
Route::post('/vendor_negotiate_detail/store', [VendorNegotiateDetailController::class, 'store'])
    ->middleware('auth')
    ->name('vendor_negotiate_detail.store');


//quesioner
Route::get('/vendor_questioner', [VendorQuesionerController::class, 'index'])->middleware('auth')->name('vendor_questioner');
Route::post('/vendor_questioner', [VendorQuesionerController::class, 'store'])->middleware('auth')->name('vendor_questioner.submit');

