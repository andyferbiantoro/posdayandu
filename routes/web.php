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

// Route::get('/', function () {
//     return view('welcome');
// });

//route login
Route::get('/', function () {return view('login');
})->name('login')->middleware('guest'); //middle ware guest buat yg blom login

Route::get('/home', function () {return view('login');
})->name('login')->middleware('guest'); //middle ware guest buat yg blom login

Route::get('/register-kader', 'AuthController@register')->name('register-kader')->middleware('guest');

Route::get('/forget-passowrd', function () {return view('forgetpassword');
})->name('forget-passowrd')->middleware('guest');





//akses halaman kader profil
// Route::get('/kader-profil', function () {return view('kader/profil');
// })->name('kader-profil')->middleware(['kader','auth']);

//akses halaman entri data
// Route::get('/kader-entri', function () {return view('entri/index');
// })->name('kader-entri')->middleware(['kader','auth']);

//akses halaan entri ibu
// Route::get('/kader-entriibu', function () {return view('entri/ibu');
// })->name('kader-entriibu')->middleware(['kader','auth']);

//akses halaan entri ibu


// Route::get('/kader-createibu', function () {return view('entri/createibu');
// })->name('kader-createibu')->middleware(['kader','auth']);

// Route::get('/kader-createkontrol', function () {return view('entri/createkontrol');
// })->name('kader-createkontrol')->middleware(['kader','auth']);

// Route::get('/kader-daftar_pengguna', function () {return view('daftar-pengguna/index');
// })->name('kader-daftar_pengguna')->middleware(['kader','auth']);

// Route::get('/kader-agenda', function () {return view('agenda/index');
// })->name('kader-agenda')->middleware(['kader','auth']);
// Route::get('qr-code-g', function () {
  
//     \QrCode::size(500)
//             ->format('png')
//             ->generate('Medikre.com', public_path('image/qrcode.png'));
    
//   return view('/kader')->middleware(['kader', 'auth']);

//route proses login
Route::post('proses-login','AuthController@prosesLogin')->name('proses-login')->middleware('guest');
Route::post('proses-register','AuthController@create')->name('proses-register')->middleware('guest');

//route logout
Route::get('logout-kader', 'AuthController@logout')->name('logout-kader')->middleware(['kader', 'auth']);// hanya kader
Route::get('logout-admin', 'AuthController@logout')->name('logout-admin')->middleware(['admin', 'auth']);// hanya admin


//Pesan
Route::get('/homes', 'PesanController@indexs')->name('homes')->middleware(['kader', 'auth']);
Route::get('/message/{id}', 'PesanController@getMessage')->name('message')->middleware(['kader', 'auth']);
Route::post('message', 'PesanController@sendMessage')->middleware(['kader', 'auth']);
Route::get('kader-pesan', 'PesanController@index')->name('kader-pesan')->middleware(['kader','auth']);

//profil kader
Route::get('/kader', 'KaderController@index')->name('dashboard-kader')->middleware(['kader','auth']); // hanya kader
Route::post('addprofil-kader', 'KaderController@addprofil')->name('addprofil-kader')->middleware(['kader', 'auth']);
Route::post('updateprofil-kader/{id_user}', 'KaderController@updateprofil')->name('updateprofil-kader/{id_user}')->middleware(['kader', 'auth']);
Route::get('kader-profil', 'KaderController@profil')->name('kader-profil')->middleware(['kader','auth']);
Route::get('kader-setting', 'KaderController@setting')->name('kader-setting')->middleware(['kader','auth']);
Route::get('kader-editpassword', 'KaderController@editpassword')->name('kader-editpassword')->middleware(['kader','auth']);
Route::post('kader-updateakun/{id}', 'KaderController@updateakun')->name('kader-updateakun/{id}')->middleware(['kader', 'auth']);
Route::post('kader-updatepassword/{id}', 'KaderController@updatepassword')->name('kader-updatepassword/{id}')->middleware(['kader','auth']);
Route::put('updatefoto-kader/{id}', 'KaderController@updatefoto')->name('updatefoto-kader/{id}')->middleware(['kader', 'auth']);

//Admin
Route::get('/admin', 'AdminController@index')->name('dashboard-admin')->middleware(['admin', 'auth']);
Route::get('admin-editstatus/{id}', 'AdminController@editstatus')->name('admin-editstatus/{id}')->middleware(['admin', 'auth']);
Route::post('admin-updatestatus/{id}', 'AdminController@updatestatus')->name('admin-updatestatus/{id}')->middleware(['admin', 'auth']); 
Route::get('admin-uploadvideo', 'AdminController@uploadvideo')->name('admin-uploadvideo')->middleware(['admin', 'auth']);
Route::get('admin-managevideo', 'AdminController@managevideo')->name('admin-managevideo')->middleware(['admin', 'auth']);
Route::post('admin-prosesupload', 'AdminController@prosesupload')->name('admin-prosesupload')->middleware(['admin', 'auth']);
Route::get('admin-delete/{id}','AdminController@destroyvideo')->name('admin-delete')->middleware(['admin','auth']);
Route::get('admin-cari','AdminController@carivideo')->name('admin-cari')->middleware(['admin','auth']);

// Daftar Pengguna
Route::get('kader-daftar_pengguna','IbuController@daftarpengguna')->name('kader-daftar_pengguna')->middleware(['kader','auth']);
Route::get('daftar_pengguna-edit/{id}','IbuController@editpengguna' )->name('daftar_pengguna-edit/{id}')->middleware(['kader','auth']);
Route::post('daftar_pengguna-update/{id}', 'IbuController@updatedaftarpengguna')->name('daftar_pengguna-update/{id}')->middleware(['kader', 'auth']);
Route::get('kader-daftar_pengguna_cari','IbuController@cari')->name('kader-daftar_pengguna_cari')->middleware(['kader','auth']);

// Agenda
Route::get('/kader-agenda', 'AgendaController@index')->name('kader-agenda')->middleware(['kader','auth']);
Route::get('/kader-riwayatagenda', 'AgendaController@riwayatagenda')->name('kader-riwayatagenda')->middleware(['kader','auth']);
Route::get('kader-createagenda', 'AgendaController@createagenda')->name('kader-createagenda')->middleware(['kader','auth']);
Route::post('kader-addagenda', 'AgendaController@addagenda')->name('kader-addagenda')->middleware(['kader','auth']);
Route::get('kader-editagenda/{id}', 'AgendaController@editagenda')->name('kader-editagenda/{id}')->middleware(['kader','auth']);
Route::post('kader-updateagenda/{id}', 'AgendaController@updateagenda')->name('kader-updateagenda/{id}')->middleware(['kader', 'auth']);
Route::get('agenda-delete/{id}','AgendaController@destroy')->name('agenda-delete')->middleware(['kader','auth']);
Route::get('agenda_cari','AgendaController@cari')->name('agenda_cari')->middleware(['kader','auth']);
Route::get('agenda_riwayat_cari','AgendaController@caririwayat')->name('agenda_riwayat_cari')->middleware(['kader','auth']);




//anak
Route::get('anak-createanak', 'AnakController@create')->name('anak-createanak')->middleware(['kader','auth']);
Route::get('anak-imunisasi', 'AnakController@imunisasi')->name('anak-imunisasi')->middleware(['kader','auth']);
Route::get('anak-kms', 'AnakController@kms')->name('anak-kms')->middleware(['kader','auth']);
Route::post('anak-addimunisasi', 'AnakController@addimunisasi')->name('anak-addimunisasi')->middleware(['kader','auth']);
Route::post('anak-addkms', 'AnakController@addkms')->name('anak-addkms')->middleware(['kader','auth']);
Route::post('anak-addanak', 'AnakController@addanak')->name('anak-addanak')->middleware(['kader','auth']);
Route::get('anak-entri','AnakController@index')->name('kader-entri')->middleware(['kader','auth']);
Route::get('anak-delete/{id}','AnakController@destroy')->name('anak-delete')->middleware(['kader','auth']);
Route::get('anak-detail{id}','AnakController@detail' )->name('anak-detail')->middleware(['kader','auth']);
//Route::get('anak-detail-all{nama_anak}','AnakController@alldetail' )->name('anak-detail-all')->middleware(['kader','auth']);
Route::get('anak-edit/{id}','AnakController@edit' )->name('anak-edit/{id}')->middleware(['kader','auth']);
Route::post('anak-updatekms/{id}', 'AnakController@updatekms')->name('anak-updatekms/{id}')->middleware(['kader', 'auth']);
Route::post('anak-updateimunisasi/{id}', 'AnakController@updateimunisasi')->name('anak-updateimunisasi/{id}')->middleware(['kader', 'auth']);
Route::get('/ibu/anak','AnakController@anak')->middleware(['kader','auth']);
Route::get('/umur/vaksin', 'AnakController@vaksin')->middleware(['kader','auth']);
Route::get('anak-cari','AnakController@cari')->name('anak-cari')->middleware(['kader','auth']);



//Ibu
Route::post('ibu-dataibu', 'IbuController@addibu')->name('ibu-dataibu')->middleware(['kader', 'auth']);// hanya kader
Route::post('ibu-datakontrolibu', 'IbuController@addkontrolibu')->name('ibu-datakontrolibu')->middleware(['kader', 'auth']);
Route::post('ibu-updatekontrol/{id}', 'IbuController@updatekontrol')->name('ibu-updatekontrol/{id}')->middleware(['kader', 'auth']);
Route::get('ibu-entriibu', 'IbuController@getkontrolibu')->name('kader-entriibu')->middleware(['kader', 'auth']);// hanya kader
Route::get('ibu-createibu','IbuController@getcreateibu')->name('ibu-createibu')->middleware(['kader','auth']);
Route::get('ibu-createkontrol','IbuController@getcreatekontrol' )->name('ibu-createkontrol')->middleware(['kader','auth']);
Route::get('ibu-detail{id}','IbuController@detail' )->name('ibu-detail')->middleware(['kader','auth']);
Route::get('ibu-delete/{id}','IbuController@destroy')->name('ibu_delete')->middleware(['kader','auth']);
Route::get('ibu-editkontrol/{id}','IbuController@editkontrol' )->name('ibu-editkontrol/{id}')->middleware(['kader','auth']);
Route::get('ibu-daftaribu','IbuController@daftaribu')->name('ibu-daftaribu')->middleware(['kader','auth']);
Route::get('ibu-cari','IbuController@carikontrol')->name('ibu-cari')->middleware(['kader','auth']);


//entri


 Auth::routes();
// Route::get('/home', 'HomeController@index');

