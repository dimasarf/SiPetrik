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
Route::get('/dashboardDinas', function(){
    return view('dashboardDinas');
});
Route::get('/dashboardTim', function(){
    return view('dashboardTimKesehatan');
});
Route::get('/login', function(){
    return view('login');
});

