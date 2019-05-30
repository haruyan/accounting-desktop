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
//     return view('auth.login');
// });

// Route::get('/', 'EntryController@index');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['web','auth']], function(){

	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
	
	Route::get('/home', 'EntryController@index');

	Route::resource('entries', 'EntryController');
	Route::resource('balances', 'BalanceController');
	Route::resource('faculties', 'FacultyController');

	Route::get('/table','TableController@index')->name('table');
	Route::get('/table/print/{year}/{faculty}', 'TableController@printpdf')->name('table.print');
	Route::post('/table/search','TableController@search')->name('table.search');
});




