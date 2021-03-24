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

Route::get('/', function () {
    return redirect('/cassana');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/layoutmahasiswa', function () {
//     return view('/layouts/menu');
// });

// Route::get('/layoutadmin', function () {
//     return view('/layouts/menuadmin');
// });

Route::resource('/cassana', 'PesananController');
Route::post('/cassanaupdate/{id}', 'PesananController@update');
Route::get('/cassanadelete/{id}', 'PesananController@destroy');


Route::get('/listPesananDone', 'PesananController@listDone');
Route::get('/listUser', 'UserController@listKaryawan');
Route::get('/editUser/{id}', 'UserController@edit');
Route::post('/editUser/{id}', 'UserController@update');
Route::post('/CariPegawai', 'UserController@find');

Route::post('/CariPesanan', 'PesananController@find');
Route::post('/CariPesananDone', 'PesananController@findDone');
Route::post('/CariPesananProses', 'ProsesController@find');
Route::get('/inputpesanan', function () {
	$tgl = "".date("Y-m-d");
    return view('/cassana/inputpesanan',["tanggal"=>$tgl]);
})->middleware('auth');
Route::get('/changepassword', function () {
    return view('/cassana/changepassword');
})->middleware('auth');
Route::get('/profil', function () {
    return view('/cassana/profil');
})->middleware('auth');

Route::get('/listProses', 'ProsesController@listp');
Route::get('/upProses/{id}', 'ProsesController@ubahProses');


Route::get('pagenotfound',['as' => 'notfound', 'uses' => 'HomeController@pagenotfound']);
Route::get('pagenotfound',function(){
	return redirect('/cassana', ['test'=> 'llala']);
});

Route::post('/changePassword','UserController@changePassword')->name('changePassword');


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.forgot.get');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.forgot.post');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.get');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset.post');

Route::post('/updateProses/{id}','PesananProsesController@updateProses');

Route::get('/registeradmin',function(){
	return view("/auth/registeradmin");
});
Route::post('/registeradmin', 'UserController@store');
// Route::get('/jadwalmatakuliahsemester', 'MatakuliahController@jadwalsemester');
// Route::post('/CariJadwal', 'MatakuliahController@findjadwal');
// Route::get('/mainmahasiswa', 'InputPerwalianController@beranda');


// // Route::get('/fpp1', function () {
// //     return view('/content/prosesfpp1');
// // });

// Route::resource('perwalian', 'MatakuliahController');
// Route::get('/fpp', 'fppcontroller@index');
// Route::post('/FindKp','fppcontroller@cariKpajax');
// Route::get('/hasilfpp', 'hasilfppcontroller@index');
// Route::get('/update-perwalian','InputPerwalianController@tampil')->middleware('adminmiddleware');

// Route::post('/CariPerwalian', 'MatakuliahController@find');
// Route::post('/AddMatkul','fppcontroller@AddMk');
// Route::post('/SaveMatkul','fppcontroller@SaveMk');
// Route::post('/update-perwalian','InputPerwalianController@ubah');



// Route::get('/adminlistkelas', 'AdminKelasController@listMatkul')->middleware('adminmiddleware');
// Route::get('/delete-kelas/{id}', 'AdminKelasController@destroy')->middleware('adminmiddleware');

// Route::get('/listperwalian', 'InputPerwalianController@listMatkul')->middleware('adminmiddleware');
// Route::get('/delete-perwalian/{id}', 'InputPerwalianController@destroy')->middleware('adminmiddleware');

// Route::get('/listmatkul', 'AdminController@listMatkul')->middleware('adminmiddleware');
// Route::get('/delete-matkul/{id}', 'AdminController@destroy')->middleware('adminmiddleware');


// //halaman
// Route::get('/adminpage', 'PagesController@adminpage')->middleware('adminmiddleware');
// Route::get('/tambah-kelas', 'PagesController@tambahkelaspage')->middleware('adminmiddleware');
// Route::get('/tambah-perwalian', 'PagesController@admininputperwalian')->middleware('adminmiddleware');

// Route::post('/simpan-kelas', 'AdminKelasController@store');
// Route::post('/simpan-matkul', 'AdminController@store');
// Route::post('/simpan-inputperwalian', 'InputPerwalianController@store');



// Route::get('/matakuliahdosen', 'Dosen@index')->middleware('dosenmiddleware');

Auth::routes();

Route::get('/home', function(){
	return redirect('/cassana');
});
