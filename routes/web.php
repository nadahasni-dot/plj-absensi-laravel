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

Route::get('/', 'DashboardController@index');

//Login
Route::get('/login', 'LoginController@index');
Route::post('/login/auth', 'LoginController@auth');
Route::get('/logout', 'LoginController@logout');

//Register
Route::get('/register', 'RegisterController@index');
Route::post('/register/add', 'RegisterController@add');


Route::get('/dashboard', 'DashboardController@index');

Route::get('/pegawai', 'UserController@index');
Route::get('/pegawai/tambah', 'UserController@tambah');
Route::post('pegawai/add', 'UserController@add');
Route::get('/pegawai/edit/{id}', 'UserController@edit');
Route::put('/pegawai/update/{id}', 'UserController@update');
Route::get('/pegawai/delete/{id}', 'UserController@delete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
