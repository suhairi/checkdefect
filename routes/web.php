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

	// Profile
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::get('/edit/{id}', 'ProfileController@edit')->name('edit');
	Route::post('/update', 'ProfileController@update')->name('update');


	// House
	Route::get('/house', 'HouseController@index')->name('house');

	Route::get('/house/create', 'HouseController@create')->name('house.create');
	Route::post('house/get_by_type', 'HouseController@get_by_type')->name('house.get_by_type');

	Route::post('/house/store', 'HouseController@store')->name('house.store');
	Route::delete('/house/destroy/{id}', 'HouseController@destroy')->name('house.destroy');
	Route::get('/house/edit/{id}', 'HouseController@edit')->name('house.edit');
	Route::post('/house/update', 'HouseController@update')->name('house.update');


	// Complaint
	Route::get('/complaint', 'ComplaintController@complaint')->name('complaint');
	Route::post('/complaint/store', 'ComplaintController@store')->name('complaint.store');
	Route::post('/complaint/get_house_info/', 'ComplaintController@get_house_info')->name('house.get_house_info');
	Route::post('/complaint/get_area_detail', 'ComplaintController@get_area_detail')->name('house.get_area_detail');
	Route::post('/complaint/get_defect', 'ComplaintController@get_defect')->name('house.get_defect');


	// PDF
	Route::get('/pdf', 'PDFController@index')->name('pdf');
	Route::get('/mail', 'MailController@index')->name('mail');
	Route::get('/whatsapp', 'WhatsappController@index')->name('whatsapp');

	// Admin
	Route::get('/aduan', 'AdminController@index')->name('aduan');
	Route::get('/pdf/report2/{id}', 'AdminController@report2')->name('report2');
	Route::get('/pdf/report3/{id}', 'AdminController@report3')->name('report3');
	Route::get('/users', 'AdminController@users')->name('users');


	// Reports
	Route::get('/admin/reports', 'ReportController@index')->name('reports');



});
