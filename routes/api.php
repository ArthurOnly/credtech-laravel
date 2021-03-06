<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('simulations', 'App\Http\Controllers\api\SimulationsController');
Route::apiResource('loan', 'App\Http\Controllers\api\LoanController');
Route::apiResource('checks', 'App\Http\Controllers\api\ChecksController');
Route::apiResource('contacts', 'App\Http\Controllers\api\ContactsController')->name('POST', 'api.contacts');