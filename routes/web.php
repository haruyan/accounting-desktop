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
    return redirect()->route('entries.index');
});

Route::get('/login', function () {
    return view('login');
});

// Route::get('/table', function () {
//     return view('table');
// });

Route::get('/table','EntryController@table')->name('table');

Route::resource('entries', 'EntryController');
Route::resource('balances', 'BalanceController');
