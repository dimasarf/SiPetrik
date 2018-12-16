<?php

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

Route::get('/', 'dmasyarakatController@index');
Route::get('/laporan', 'formLaporanController@index');
Route::post('/laporan', 'formLaporanController@store');
// Route::get('/dashboardDinas', 'dDinasKesehatanController@index');
Route::get('/dashboardTim', 'dTimKesehatanController@index');
Route::get('/map', function(){
    return view('testLocation');
});
Route::get('/complete','formLaporanController@complete');



Auth::routes();

Route::get('/dashboardDinas', 'dDinasKesehatanController@index');
Route::get('/laporan', 'dDinasKesehatanController@laporan');
Route::get('/laporanKejadian', 'formLaporanController@index');

Route::GET('admin-login','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin-login','Admin\LoginController@login');
Route::POST('admin-logout','Admin\LoginController@logout')->name('admin.logout');
Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.passsword.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset',  'Admin\ResetPasswordController@reset')->name('admin.password.update');
Route::GET('admin-password/reset/{token}' ,'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::GET('admin-register','Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::POST('admin-register','Admin\RegisterController@register');
Route::GET('/kejadian/{id}', 'dDinasKesehatanController@loadKejadian');
Route::GET('/bencana/{id}', 'TesController@load');
Route::POST('/store', 'dDinasKesehatanController@store');
Route::GET('/penugasan/{id}', 'dTimKesehatanController@loadPenugasan');
Route::get('pemetaanDinas', 'dDinasKesehatanController@pemetaan');
// Route::resource('pengirimanTim', 'PengirimanTimController');
Route::get('/kirimTim/{id}', 'dDinasKesehatanController@kirimTim');
Route::get('/verifiedLaporan', 'dDinasKesehatanController@loadVerifiedLaporan');
Route::get('/detailMarker/{id}', 'dDinasKesehatanController@detailMarker');
Route::get('/findTeam/{id}', 'dDinasKesehatanController@findTeam');
Route::get('/handleLaporan/{id}', 'dTimKesehatanController@handleLaporan');
Route::get('/finishLaporan/{id}', 'dTimKesehatanController@finishLaporan');
Route::get('/tarikTim/{id}', 'dDinasKesehatanController@tarikTim');
Route::get('/penugasan' ,'dTimKesehatanController@index');
Route::get('/pemetaanTim' ,'dTimKesehatanController@pemetaan');
Route::get('/triase' ,'dTimKesehatanController@getTriase');
Route::get('/getCara/{id}' ,'dTimKesehatanController@getCaraPenanganan');
Route::get('/welcome' ,'dTimKesehatanController@landingPage');