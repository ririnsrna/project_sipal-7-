<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('root');

Route::get('/home', 'HomeController@dashboard')->name('home')->middleware('auth');
Route::get('/user_karyawan', 'DataController@karyawan')->name('karyawan');
Route::get('/kategori_alat', 'DataController@kategori_alat')->name('kategori_alat');
Route::get('/alat', 'DataController@alat')->name('alat');
Route::get('/peminjaman_alat', 'DataController@peminjaman_alat')->name('peminjaman_alat');
Route::get('/info', 'DataController@info')->name('info');
Route::get('/detail_alat/{id}', 'DataController@data_alat')->name('detail_alat');

// Data Member
Route::post('/insert_new_member', 'DataController@insert_member')->name('insert_new_member');
Route::post('/insert_new_kategori', 'DataController@insert_kategori')->name('insert_new_kategori');
Route::post('/proses_edit_member', 'DataController@proses_edit_member')->name('proses_edit_member');
Route::get('/user', 'DataController@user')->name('member');
Route::get('/ubah_member/{id}', 'DataController@edit_member');
Route::get('/hapus_member/{id}', 'DataController@hapus_member');

// Kategori
Route::post('/insert_new_kategori', 'DataController@insert_kategori')->name('insert_new_kategori');
Route::get('/ubah_kategori/{id}', 'DataController@edit_kategori');
Route::get('/hapus_kategori/{id}', 'DataController@hapus_kategori');
Route::post('/proses_edit_kategori', 'DataController@proses_edit_kategori')->name('proses_edit_kategori');
Route::get('/hapus_kategori/{id}', 'DataController@hapus_kategori');

// alat
Route::post('/insert_new_alat', 'DataController@insert_alat')->name('insert_new_alat');
Route::get('/detail_alat/ubah_alat/{id}', 'DataController@edit_alat');
Route::get('/detail_alat/hapus_alat/{id}', 'DataController@hapus_alat');
Route::post('/proses_edit_alat', 'DataController@proses_edit_alat')->name('proses_edit_alat');

// Peminjaman
Route::post('/insert_new_peminjaman', 'DataController@insert_peminjaman')->name('insert_new_peminjaman');
Route::get('/ubah_status/{id}', 'DataController@ubah_status');
Route::get('/hapus_peminjaman/{id}', 'DataController@hapus_peminjaman');

// User
Route::get('/konfirmasi', 'DataController@getKonfirmasi')->name('getKonfirmasi');
Route::post('/konfirmasi', 'DataController@postKonfirmasi')->name('postKonfirmasi');
Route::get('/ubah_user', 'DataController@ubah_user')->name('ubah_user');
Route::post('/proses_edit_user', 'DataController@proses_edit_user')->name('proses_edit_user');
Route::get('/tambah_user', 'DataController@tambahdata');
Route::get('/tambah_alat', 'DataController@tambahalat');
Route::get('/tambah_alat/{id}', 'DataController@insert_new_detail')->name('insert_new_detail');

// Laporan
Route::get('/laporan', 'ReportController@getReport')->name('getReport');
Route::post('/laporan', 'ReportController@postReport')->name('postReport');
