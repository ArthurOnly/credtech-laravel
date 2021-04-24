<?php

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
    return view('site.index');
});

Route::get('/taxas', function () {
    return view('site.taxas');
})->name('taxas');

Route::get('/contato', function () {
    return view('site.contato');
});

Route::get('/emprestimo', function () {
    return view('site.emprestimo');
});

Route::get('/desconto-de-titulos', function () {
    return view('site.trocar_cheques');
});

Route::get('/quem-somos', function () {
    return view('site.quem_somos');
})->name('quemsomos');

Route::get('/faq', function () {
    return view('site.faq');
});

Route::get('auth/login', 'App\Http\Controllers\AuthController@loginForm');
//Route::get('auth/sign-up', 'App\Http\Controllers\AuthController@signupForm');
Route::get('auth/logout', 'App\Http\Controllers\AuthController@logout')->name('auth.logout');

Route::post('auth/login', 'App\Http\Controllers\AuthController@login')->name('auth.login');
//Route::post('auth/sign-up', 'App\Http\Controllers\AuthController@signUp')->name('auth.signup');


Route::get('admin/panel', 'App\Http\Controllers\AdminController@panel')->name('admin.panel')->middleware('auth');
Route::get('admin/simulacoes', 'App\Http\Controllers\AdminController@simulacoes')->name('admin.simulacoes')->middleware('auth');
Route::get('admin/contatos', 'App\Http\Controllers\AdminController@contatos')->name('admin.contatos')->middleware('auth');
Route::get('admin/emprestimos', 'App\Http\Controllers\AdminController@emprestimos')->name('admin.emprestimos')->middleware('auth');
Route::get('admin/cheques', 'App\Http\Controllers\AdminController@cheques')->name('admin.cheques')->middleware('auth');