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

Auth::routes(['reset' => false, 'register' => false]);

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
	Route::post('/complaint/get_sticker_info/', 'ComplaintController@get_sticker_info')->name('house.get_sticker_info');
	Route::post('/complaint/get_house_info/', 'ComplaintController@get_house_info')->name('house.get_house_info');
	Route::post('/complaint/get_area_detail', 'ComplaintController@get_area_detail')->name('house.get_area_detail');
	Route::post('/complaint/get_defect', 'ComplaintController@get_defect')->name('house.get_defect');

	// User - Aduan
	Route::get('/complaint/list', 'ComplaintController@list')->name('listAduan');
	Route::get('/complaint/sent/{id}', 'ComplaintController@sent')->name('sent');
	Route::get('/complaint/details/{id}', 'ComplaintController@details')->name('complaint.details');


	// PDF
	Route::get('/pdf', 'PDFController@index')->name('pdf');
	Route::get('/mail', 'MailController@index')->name('mail');
	Route::get('/whatsapp', 'WhatsappController@index')->name('whatsapp');

	// Admin
	Route::get('/aduan', 'AdminController@index')->name('aduan');
	Route::get('/users', 'AdminController@users')->name('users');
	Route::get('/register', 'AdminController@register')->name('register');
	Route::post('/register', 'AdminController@postRegister')->name('postRegister');

	Route::get('/pdf/files/{id}', 'AdminController@listFiles')->name('files');

	Route::get('/admin/submitpdf/{id}', 'AdminController@submitPdf')->name('submitPdf');


	// Reports
	Route::get('/admin/reports', 'ReportController@index')->name('reports');

	// Test Send Mail
	Route::get('/admin/mail', 'MailController@index')->name('mail');



});
