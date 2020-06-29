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
    return view('welcome');
});
Route::resource('supplier','SupplierController');

Route::resource('detailsupply','DetailSupplyController');

Route::resource('supply','SupplyController');

Route::resource('obat','ObatController');

Route::resource('karyawan','KaryawanController');

Route::resource('pelanggan','PelangganController');

Route::resource('penjualan','PenjualanController');

Route::get('/{id}/print', 'PenjualanController@print')->name('penjualan.print');

Route::resource('pengembalian','PengembalianController');

Route::resource('detailpenjualan','DetailPenjualanController');

Auth::routes();

Route::get('/halamanutama', 'HalamanUtamaController@index')->name('home');

Auth::routes();

Route::get('/klien', 'KlienController@index')->name('home');



Route::resource('supplier', 'SupplierController');




