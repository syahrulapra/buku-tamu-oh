<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'form@form')->name('form');

Route::get('/login', 'login@index');

Route::post('/loginaksi', 'login@loginaksi')->name('loginaksi');

Route::get('/logoutaksi', 'login@logoutaksi')->name('logoutaksi');


Route::post('/tambah', 'form@tambah');

Route::get('/cari', 'form@cari');

Route::middleware('auth')->group(function(){

    Route::get('/list', 'form@index')->name('list');
    
    Route::get('list/hari/{hari}','form@hari')->name('listhari');
});