<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mdd\ppauth\AuthController;
use App\Http\Controllers\mdd\dashboard\UserController;
use App\Http\Controllers\mdd\dashboard\manageusercontroller;
use App\Http\Controllers\mdd\dashboard\departmentcontroller;
use App\Http\Controllers\mdd\dashboard\statuscontroller;


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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// ----------------------- private_auth --------------------------------

Route::controller(AuthController::class)->group(function () {

    Route::get('mdd-properties/js/register','register')->name('private_register');
    Route::post('mdd-properties/js/register_submit','register_submit')->name('private_register.submit');

});


Route::prefix('mdd-properties-opc/dashboard/')->group(function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(UserController::class)
            ->group(function() {

                Route::get('index','index')->name('user.index');

    });
});

// MANAGE USER
Route::prefix('mdd-properties/dashboard/jsx/manage-user')->group(function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(manageusercontroller::class)
            ->group(function() {

                Route::get('request-account-index','request_account')->name('mu.request-account-index');
                Route::get('request-account-update/{id}','request_account_edit')->name('mu.request-account-edit');
                Route::post('request-account-move/{id}','request_account_move')->name('mu.request-account-move');

    });
});

// MANAGE DEPARTMENT
Route::prefix('mdd-properties/dashboard/jsx/manage-department')->group(function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(departmentcontroller::class)
            ->group(function() {

                Route::get('index','index')->name('manage-department-index');
                Route::post('submitaa','form_submit')->name('manage-department-submit');
                // Route::post('index','edit')->name('md.edit');
                // Route::post('index','update')->name('md.update');
                // Route::post('index','delete')->name('md.delete');

    });
});

// MANAGE STATUS
Route::prefix('mdd-properties/dashboard/jsx/manage-status')->group(function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
        ->controller(statuscontroller::class)
            ->group(function() {

                Route::get('index','index')->name('manage-status-index');
                Route::post('submit','form_submit')->name('manage-status-submit');

    });
});

// Route::prefix('mdd-properties/dashboard/jsx/manage-department')->group(function(){
//     Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
//         ->controller(UserController::class)
//             ->group(function() {

//                 Route::get('index','index')->name('user.index');

//     });
// });
