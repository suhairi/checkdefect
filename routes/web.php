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
    return view('auth.login');
});

Auth::routes(['reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'users'], function() {

	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::get('/edit/{id}', 'ProfileController@edit')->name('edit');
	Route::post('/update', 'ProfileController@update')->name('update');

});
