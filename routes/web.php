<?php

Route::get('/', function () {
    return view('welcome');
});


Route::match(['get','post'],'/admin', 'AdminController@login');

Auth::routes();

Route::group(['middleware' => ['auth']],function(){
	Route::get('/admin/dashboard','AdminController@dashboard');	
	Route::get('/admin/settings','AdminController@settings');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
	
	Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');


});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout','AdminController@logout');