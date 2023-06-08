<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mdd\front\homecontroller;
use App\Http\Controllers\mdd\front\iocontroller;
use App\Http\Controllers\mdd\front\accountcontroller;
use App\Http\Controllers\mdd\front\updateFrontcontroller;
use App\Http\Controllers\mdd\front\propertiesFrontcontroller;

use App\Http\Livewire\Manage\ManageStatus;
use App\Http\Livewire\Manage\ManageComponentStatus;

use App\Http\Controllers\mdd\ppauth\AuthLoginController;

use App\Http\Controllers\mdd\ppauth\AuthController;
use App\Http\Controllers\mdd\dashboard\UserController;
use App\Http\Controllers\mdd\dashboard\manageusercontroller;
use App\Http\Controllers\mdd\dashboard\departmentcontroller;
use App\Http\Controllers\mdd\dashboard\statuscontroller;
use App\Http\Controllers\mdd\dashboard\myemailcontroller;
use App\Http\Controllers\mdd\dashboard\generateuqid;
use App\Http\Controllers\mdd\dashboard\validateUser;
use App\Http\Controllers\mdd\dashboard\locationcontroller;
use App\Http\Controllers\mdd\dashboard\projectcontroller;
use App\Http\Controllers\mdd\dashboard\cashercontroller;
use App\Http\Controllers\mdd\dashboard\clientcontroller;
use App\Http\Controllers\mdd\dashboard\propertycontroller;
use App\Http\Controllers\mdd\dashboard\UpdateController;
use App\Http\Controllers\mdd\dashboard\CreateController;
use App\Http\Controllers\mdd\dashboard\pricingcontroller;
use App\Http\Controllers\mdd\PaymentController;
use App\Http\Controllers\mdd\CheckoutController;

use App\Http\Controllers\mdd\public\PubhomeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PubhomeController::class)->group(function () {
    Route::get('/','index')->name('mdd-home');
});


Route::controller(iocontroller::class)->group(function () {
    Route::get('home/register','register_create')->name('ioregister');
    Route::post('home/registered','register_submit')->name('ioregister_submit');
    Route::get('home/validate-email/{id}/{uqid}','verifyClient')->name('iovalidate_email');
    Route::get('home/login','login')->name('iologin');
    Route::post('home/login','login_attemp')->name('iologin_attemp');
    Route::post('home/logout','logout_attemp')->name('iologout_attemp');
});

Route::controller(homecontroller::class)->group(function () {
    Route::get('/','homeIndex')->name('homes');
    Route::get('/home/about-Us','aboutUsIndex')->name('front-aboutus-index');
});


Route::controller(propertiesFrontcontroller::class)->group(function () {
    Route::get('properties','propertiesIndex')->name('front-properties-index');
    Route::get('properties/selected/{area}','propertySelect')->name('front-properties-selected');
    Route::get('/home/pricing','pricingIndex')->name('front-pricing-index');
    
    Route::get('properties/selected/{name}/{id}','proprtyLotArea')->name('front-proprtyLotArea');
    Route::get('properties/selected/{name}/{siteid}/{id}','propertiesLotAreaCosting')->name('front-propertiesLotAreaCosting');
    Route::get('properties/selected/lot/{id}','getPropertyInfo')->name('front-getproperty-info');
});

Route::controller(PaymentController::class)->group(function () {
    Route::get('/home/pay','pay')->name('front-pay');
    Route::get('/home/success','success')->name('front-pay');
    // Route::get('/home/link-pay','linkPay')->name('link-pay');
    // Route::get('/home/link-status/{linkid}','linkStatus')->name('link-status');
    // Route::get('/home/refund','refund')->name('front-refund');
    // Route::get('/home/refund-status/{id}','refundStatus')->name('front-refund-status-id');
});

Route::controller(CheckoutController::class)->group(function () {
    Route::post('/home/checkout','index')->name('xendit_checkout');
    Route::get('/try-checkout','onSubmit')->name('onSubmit');
});

// Route::prefix('home')->group(function(){
//     Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])

//         ->controller(CheckoutController::class)->group(function() {

//         Route::post('/checkout','index')->name('xendit_checkout');
//         Route::get('/try-checkout','onSubmit')->name('onSubmit');

//     });
// });



Route::prefix('home/account')->group(function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(accountcontroller::class)
            ->group(function() {

                Route::get('my-credential','credential')->name('mycredential');
                Route::post('my-credential','credential_create')->name('mycredential_create');
                Route::get('getCredential-accnt/{id}','getCredential')->name('getcredential_accnt');
    });
});

Route::prefix('home/account')->group(function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(updateFrontcontroller::class)
            ->group(function() {

                Route::post('my-credential-update','myCredential')->name('mycredential_update');
    });
});








Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// ----------------------- LOGIN --------------------------------

Route::controller(AuthLoginController::class)->group(function () {
    Route::get('mdd-properties/staff/login','login')->name('mdd-login');
    Route::post('mdd-properties/staff/login-validate','login_validate')->name('mdd-validate-login');
    Route::get('mdd-properties/staff/login-validate','attemp_login_validate')->name('attemp-mdd-validate-login');

});

// ----------------------- REGISTER/--------------------------------

Route::controller(AuthController::class)->group(function () {
    Route::get('mdd-properties/staff/register','register')->name('staff_register');
    Route::post('mdd-properties/js/register_submit','register_submit')->name('private_register.submit');
    Route::get('mdd-properties/mdd-staff/{id}/{uqid}','staffVerifyEmail')->name('mdd-staff');
});


Route::controller(validateUser::class)->group(function () {

    Route::get('auth','validateDepartment')->name('authd');

});



Route::prefix('mdd-properties-opc/dashboard/')->group(function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(UserController::class)
            ->group(function() {

                Route::get('index','index')->name('user.index');

    });
});

Route::prefix('mdd-properties-opc/generateuqid')->group(function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(generateuqid::class)
            ->group(function() {

                Route::get('generate','generateNine')->name('generate-nine');

    });
});

// MANAGE USER
Route::prefix('mdd-properties/dashboard/jsx/manage-user')->group(function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(manageusercontroller::class)
            ->group(function() {

                Route::get('request-account-index','request_account')->name('mu.request-account-index');
                Route::get('request-account-update/{id}','edit_request_account')->name('mu-edit-equest-account');
                Route::post('request-account-move','request_account_move')->name('mu-request-account-move');
                Route::post('request-account-delete','request_account_delete')->name('mu-request-account-delete');

                Route::get('user-list','user_index')->name('mu.user-index');
                // Route::get('user-edit/{id}','user_edit')->name('mu.user-edit');
                Route::post('user-update','user_update')->name('mu-user-update');

    });
});


// MANAGE USER send EMAIL
Route::prefix('mdd-properties/dashboard/jsx/manage-email')->group(function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(myemailcontroller::class)
            ->group(function() {

                Route::get('sendmail','sendEmail')->name('mu.user-edit');

    });
});


// MANAGE DEPARTMENT
Route::prefix('mdd-properties/dashboard/jsx/manage-department')->group(function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(departmentcontroller::class)
            ->group(function() {

                Route::get('index','index')->name('manage-department-index');
                Route::post('create','create')->name('md-create');
                Route::get('edit/{id}','edit')->name('md-edit');
                Route::post('update','update')->name('md-update');

    });
});

// MANAGE STATUS
Route::prefix('mdd-properties/dashboard/jsx/managestatus')->group(function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(statuscontroller::class)
            ->group(function() {
                Route::get('index','index')->name('manage-status-index');
                Route::get('status-form-edit/{id}','status_form_edit')->name('status-form-edit');
                Route::post('status-form-create','status_form_create')->name('status-form-create');
                Route::post('status-form-update','status_form_update')->name('status-form-update');
                Route::post('status-form-delete','status_form_delete')->name('status-form-delete');
    });
});


// MANAGE STAFF
Route::prefix('mdd-properties/dashboard/jsx/managestaff')->group(function() {
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(locationcontroller::class)
            ->group(function() {
                Route::get('locations','locations')->name('ms-location');

                Route::post('locations-province-new','locations_new')->name('ms-location-new');
                Route::get('locations-province-edit/{id}','locations_edit')->name('ms-location-edit');
                Route::post('locations-province-update','location_provinces_update')->name('ms-location_provinces_update');
                Route::get('locations-province-delete/{id}','location_provinces_delete')->name('ms-location_provinces_delete');
                Route::post('locations-province-deleted','location_provinces_deleted')->name('ms-location_provinces_deleted');

                Route::post('locations_new_city','locations_new_city')->name('ms-location_new_city');
                Route::post('locations__new_barangay','locations_new_barangay')->name('ms-location_new_barangay');

                Route::get('getprovices','getProvinces')->name('getprovinces');
                Route::get('getcities','getCities')->name('getcities');
                Route::get('getbarangays','getBarangay')->name('getbarangay');




    });
});

// MANAGE PRICING
Route::prefix('mdd-properties/dashboard/jsx/managespricing')->group(function() {
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(pricingcontroller::class)
            ->group(function() {
                Route::get('index','index')->name('ms_pricing_index');
    });
});

// MANAGE STAFF - PROJECTS

Route::prefix('mdd-properties/dashboard/jsx/managestaff')->group(function() {
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(projectcontroller::class)
            ->group(function() {
                Route::get('projects-index','index')->name('ms-projects-index');
                Route::get('projects-slug','project')->name('ms-projects-slug');
                Route::get('projects-form','project_form')->name('ms-projects-form');
                Route::post('project-store','project_store')->name('ms-project-store');
                Route::post('project-properties-store','properties_store')->name('ms-properties-store');
                Route::get('get-project-info/{id}/{area}','get_project_info')->name('ms-get-project-info');
                Route::get('get-property-inf-id/{id}/{area}','get_property_info')->name('ms-get-property-info');

                Route::get('property-costing-index','costing_index')->name('ms-property-costing-index');
                Route::get('property-costing-form','calculation')->name('ms-property-calculation-index');
                Route::post('property-costing-sumbit','costing_submit')->name('ms-property-costing-submit');
                Route::get('get-costing-details/{id}','get_costing')->name('ms-get-costing-details');
                Route::get('get-costingId','get_costingId')->name('ms-get-costingId');


                Route::get('projects-site','project_listing')->name('ms-project_site');
                Route::get('projects-site-id/{id}','project_site')->name('ms-project-site-id');
                Route::get('projects-property-id','project_property_site')->name('ms-project-property-id');
                Route::get('projects-property-lotid','project_propertylot_site')->name('ms-projects-property-lotid');
                Route::get('projects-property-area-price/{id}','project_property_areaPrice')->name('ms-projects-property-area-price');

    });
});

// CASHER

Route::prefix('dashboard/mddproperties/casher.pay')->group(function() {
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(cashercontroller::class)
            ->group(function() {
                Route::get('walk-in','pay')->name('casher-over-the-counter');
                Route::get('walk-in-search-ID','search_client_name')->name('c-search-client-name');
                // Route::get('walk-in-search-ID','search_client_name')->name('c-search-client-name');
                Route::get('walk-in/pay-method','pay_method')->name('c-walk-in-paymethod');


                


    });
});

Route::prefix('dashboard/mddproperties/property')->group(function() {
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(propertycontroller::class)
            ->group(function() {
                Route::get('get-property-id/{id}','JsonPropertyId')->name('p-get-property');


                


    });
});


// CLIENT

Route::prefix('mdd-properties/dashboard/jsx/client')->group(function() {
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(clientcontroller::class)
            ->group(function() {
                Route::get('client-index','client_index')->name('c-client_index');
                Route::post('client-create','client_create')->name('c-client-create');
                Route::get('client-name','client_name')->name('c-client-name');
                

    });
});


Route::prefix('mdd-properties/dashboard/update/info')->group(function() {
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(UpdateController::class)
            ->group(function() {
                Route::put('update-property','updatePropertY')->name('update-property');

    });
});

Route::prefix('mdd-properties/dashboard/create/pay')->group(function() {
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(CreateController::class)
            ->group(function() {
                Route::post('cash','pay')->name('cc-pay');

    });
});

// LIVEWIRE MANAGE STATUS
Route::get('/stat',ManageStatus::class)->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified']);
Route::get('manage_component_status',ManageComponentStatus::class);
