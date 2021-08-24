<?php

use Illuminate\Http\Request;

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
Route::post('scan-qr/{id}','IbuApiController@scanqrcode');
Route::post('scan-qr-kms/{id}','AnakApiController@scanqrcodekms');

Route::get('/umur/vaksin/{id}', 'AnakController@vaksin');
Route::get('/ibu/anak/{id}','AnakController@anak');
Route::post('register','AuthApiController@register');
Route::post('ceknomor','AuthApiController@ceknomor');
Route::post('login','AuthApiController@login');

Route::post('tambahdataanak','AnakController@create');
Route::get('dataanak','AnakController@indexdataanak');

Route::get('kontrolkehamilan/{id}','IbuApiController@kontrolkehamilan');
Route::get('kontrolkehamilan_last/{id}','IbuApiController@kontrolkehamilan_last');

Route::get('kms/{id}','AnakApiController@kms');
Route::get('imunisasi/{id}','AnakApiController@imunisasi');
Route::get('kms_last/{id}','AnakApiController@kms_last');
Route::get('imunisasi_last/{id}','AnakApiController@imunisasi_last');


Route::get('show_ibu/{id}','IbuApiController@showdata_ibu');
Route::post('updatedata_ibu/{id}','IbuApiController@updatedata_ibu');

Route::get('anak/{id}','AnakApiController@dataanak');


Route::post('kirimpesan/{id}','PesanController@kirimpesan');
Route::post('kirimpesanadmin/{id}','PesanController@kirimpesanadmin');
Route::get('pesankader/{id_user}','PesanController@pesankader');
Route::get('pesanallkader/{id_user}','PesanController@pesanallkader');
Route::get('pesanallforuser/{id_user}','PesanController@pesanallforuser');
Route::get('pesanallgetread/{id_pengirimkader}/{id_user}','PesanController@pesanallgetread');


Route::post('searchkms/{id}','AnakApiController@Searchkms');
Route::post('searchimunisasi/{id}','AnakApiController@SearchImunisasi');
Route::get('video','IbuApiController@index');
Route::post('searchvideo','IbuApiController@searchvideo');
Route::post('searchkontrolhamil/{id}','IbuApiController@SearchKK');

Route::post('charge', 'TopupControllers@TopUp');
Route::post('payment/notification', 'TopupControllers@notification');

