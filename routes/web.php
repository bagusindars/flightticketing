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

Route::get('/','frontcont@index');
Route::get('/home',function(){
	return redirect('/');
});
Route::get('/index',function(){
	return redirect('/');
});
Route::get('/jadwal', 'frontcont@jadwal');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'],function(){
	Route::get('/admin', 'HomeController@index')->name('index')->middleware('admin');
	Route::get('/loginas',function(){
		if(Auth::user()->role == 'user')
			return redirect('');
		else
			return redirect('/admin');
	});


	Route::group(['middleware' => 'admin'],function(){
		Route::get('admin/mairlist','AdminController@viewallAL');
		Route::get('admin/create/al','AdminController@create');
		Route::post('admin/create/al','AdminController@store');
		Route::get('admin/mairlist/{id}/edit','AdminController@edit');
		Route::post('admin/mairlist/{id}','AdminController@show');
		Route::delete('admin/mairlist/{id}','AdminController@delete');

		Route::get('admin/mrute','AdminController@viewallRute');
		Route::get('admin/create/rute','AdminController@createrute');
		Route::get('admin/create/rute/get1/{id}', 'AdminController@getBandara1');
		Route::get('admin/create/rute/get2/{id}', 'AdminController@getBandara2');
		Route::get('admin/create/rute/get3/{id}', 'AdminController@getKursi');
		Route::post('admin/create/rute','AdminController@storerute');
		Route::get('admin/mrute/{id}/edit','AdminController@editrute');
		Route::post('admin/mrute/{id}','AdminController@showrute');
		Route::delete('admin/mrute/{id}','AdminController@deleterute');

		Route::get('admin/mkota','AdminController@viewallKota');
		Route::get('admin/create/kota','AdminController@createkota');
		Route::post('admin/create/kota','AdminController@storekota');
		Route::get('admin/mkota/{id}/edit','AdminController@editkota');
		Route::post('admin/mkota/{id}','AdminController@showkota');
		Route::delete('admin/mkota/{id}','AdminController@deletekota');

		Route::get('admin/mbandara','AdminController@viewallBandara');
		Route::get('admin/create/bandara','AdminController@createbandara');
		Route::post('admin/create/bandara','AdminController@storebandara');
		Route::get('admin/mbandara/{id}/edit','AdminController@editbandara');
		Route::post('admin/mbandara/{id}','AdminController@showbandara');
		Route::delete('admin/mbandara/{id}','AdminController@deletebandara');

		Route::get('admin/muser','AdminController@viewallUser');
		Route::post('admin/muser/{id}','AdminController@showuser');
		Route::delete('admin/muser/{id}','AdminController@deleteuser');


	});

});


Route::get('/pemesanan',function(){
		return redirect()->back();
	});
Route::get('/pemesanan/{id}','frontcont@pemesanan');

