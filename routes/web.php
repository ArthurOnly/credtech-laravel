<?php

use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/taxas', function () {
    return view('taxas');
});

Route::get('/contato', function () {
    return view('contato');
});

Route::get('/emprestimo', function () {
    return view('emprestimo');
});

Route::get('/desconto-de-titulos', function () {
    return view('trocar_cheques');
});

Route::get('/quem-somos', function () {
    return view('quem_somos');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('admin', 'App\Http\Controllers\AdminController@index');
Route::get('admin/panel', 'App\Http\Controllers\AdminController@panel');
Route::get('admin/simulacoes', 'App\Http\Controllers\AdminController@simulacoes');