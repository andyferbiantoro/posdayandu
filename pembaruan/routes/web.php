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

Route::get('/register', function () {return view('register');
})->name('register')->middleware('guest');

Route::get('/forget-passowrd', function () {return view('forgetpassword');
})->name('forget-passowrd')->middleware('guest');

Route::get('/admin', function () {return view('admin/index');
})->name('dashboard-admin')->middleware(['admin', 'auth']); //middle ware admin dan auth buat yg blom cegah yang bisa hanya admin

Route::get('/kader', function () {return view('kader/index');
})->name('dashboard-kader')->middleware(['kader','auth']); // hanya kader

//akses halaman kader profil
Route::get('/kader-profil', function () {return view('kader/profil');
})->name('kader-profil')->middleware(['kader','auth']);

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


//route proses login
Route::post('proses-login','AuthController@prosesLogin')->name('proses-login')->middleware('guest');
Route::post('proses-register','AuthController@create')->name('proses-register')->middleware('guest');

//route logout
Route::get('logout-kader', 'AuthController@logout')->name('logout-kader')->middleware(['kader', 'auth']);// hanya kader
Route::get('logout-admin', 'AuthController@logout')->name('logout-admin')->middleware(['admin', 'auth']);// hanya admin


//profil kader
Route::post('addprofil-kader', 'KaderController@addprofil')->name('addprofil-kader')->middleware(['kader', 'auth']);// hanya kader
Route::get('kader-profil', 'KaderController@profil')->name('kader-profil')->middleware(['kader','auth']);


// Daftar Pengguna
Route::get('kader-daftar_pengguna','IbuController@daftaragenda')->name('kader-daftar_pengguna')->middleware(['kader','auth']);


// Agenda
Route::get('/kader-agenda', function () {return view('agenda/index');
})->name('kader-agenda')->middleware(['kader','auth']);

//anak
Route::get('anak-createanak', 'AnakController@create')->name('kader-createanak')->middleware(['kader','auth']);
Route::get('anak-imunisasi', 'AnakController@imunisasi')->name('kader-imunisasi')->middleware(['kader','auth']);
Route::get('anak-kms', 'AnakController@kms')->name('kader-kms')->middleware(['kader','auth']);
Route::post('anak-addimunisasi', 'AnakController@addimunisasi')->name('entri-addimunisasi')->middleware(['kader','auth']);
Route::post('anak-addkms', 'AnakController@addkms')->name('entri-addkms')->middleware(['kader','auth']);
Route::post('anak-addanak', 'AnakController@addanak')->name('entri-addanak')->middleware(['kader','auth']);
Route::get('anak-entri','AnakController@index')->name('kader-entri')->middleware(['kader','auth']);
Route::get('anak-entri/{id}','AnakController@destroy')->name('delete-anak')->middleware(['kader','auth']);

//Ibu
Route::post('ibu-dataibu', 'IbuController@addibu')->name('entri-dataibu')->middleware(['kader', 'auth']);// hanya kader
Route::post('ibu-datakontrolibu', 'IbuController@addkontrolibu')->name('entri-datakontrolibu')->middleware(['kader', 'auth']);
Route::post('ibu-updatekontrol', 'IbuController@updatekontrol')->name('entri-updatekontrol')->middleware(['kader', 'auth']);
Route::get('ibu-entriibu', 'IbuController@getkontrolibu')->name('kader-entriibu')->middleware(['kader', 'auth']);// hanya kader
Route::get('ibu-createibu','IbuController@getcreateibu')->name('kader-createibu')->middleware(['kader','auth']);
Route::get('ibu-createkontrol','IbuController@getcreatekontrol' )->name('kader-createkontrol')->middleware(['kader','auth']);
Route::get('ibu-detail{id}','IbuController@detail' )->name('ibu-detail')->middleware(['kader','auth']);
Route::get('ibu-entriibu/{id}','IbuController@destroy')->name('delete')->middleware(['kader','auth']);
Route::get('ibu-editkontrol{id}','IbuController@editkontrol' )->name('kader-editkontrol')->middleware(['kader','auth']);


//entri


 Auth::routes();
// Route::get('/home', 'HomeController@index');

