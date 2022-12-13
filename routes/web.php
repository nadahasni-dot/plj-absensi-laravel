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

//Dashboard
Route::get('/dashboard', 'DashboardController@index');

//Profile
Route::get('/profile/{id}', 'ProfileController@index');
Route::put('/profile/update/{id}', 'ProfileController@update');

//Pegawai
Route::get('/pegawai', 'UserController@index');
Route::get('/pegawai/tambah', 'UserController@tambah');
Route::post('pegawai/add', 'UserController@add');
Route::get('/pegawai/edit/{id}', 'UserController@edit');
Route::put('/pegawai/update/{id}', 'UserController@update');
Route::get('/pegawai/delete/{id}', 'UserController@delete');

//Schedule
Route::get('/schedule', 'ScheduleController@index');
Route::put('/schedule/update/{id}', 'ScheduleController@update');

//Atendance
Route::get('/attendance', 'AttendanceController@index');
Route::post('/attendance/date', 'AttendanceController@date');

Route::get('/termsandcondition', function () {
    return view('terms');
});

Route::get('/privacypolicy', function () {
    return view('privacy');
});
// Route::match(array('GET','POST'),'/attendance', 'AttendanceController@index');
// Route::match(array('GET','POST'),'/attendance/date', 'AttendanceController@index');
// Route::post('/attendance/date', 'AttendanceController@date');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
