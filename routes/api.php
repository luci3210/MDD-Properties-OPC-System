<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mdd\CheckoutController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get("health", function() {
    return ['ok'];
});

// Route::post("invoice", [
//     CheckoutController::class, 
//     'create'
// ]);

Route::controller(CheckoutController::class)->group(function () {
    Route::post('invoice','create')->name('invoice');
});