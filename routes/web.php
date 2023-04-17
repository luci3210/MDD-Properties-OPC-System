<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mdd\ppauth\AuthController;
use App\Http\Controllers\mdd\dashboard\UserController;
use App\Http\Controllers\mdd\dashboard\manageusercontroller;
use App\Http\Controllers\mdd\dashboard\departmentcontroller;
use App\Http\Controllers\mdd\dashboard\statuscontroller;
use App\Http\Controllers\mdd\dashboard\myemailcontroller;
use App\Http\Controllers\mdd\dashboard\generateuqid;
use App\Http\Controllers\mdd\dashboard\validateUser;
use App\Http\Livewire\Manage\ManageStatus;
use App\Http\Livewire\Manage\ManageComponentStatus;
use App\Http\Controllers\mdd\ppauth\AuthLoginController;


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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/stat', ManageStatus::class);

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
                Route::get('user-edit/{id}','user_edit')->name('mu.user-edit');

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

// LIVEWIRE MANAGE STATUS
Route::get('/stat',ManageStatus::class)->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified']);
Route::get('manage_component_status',ManageComponentStatus::class);
