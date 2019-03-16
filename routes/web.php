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
	Route::get('/admin/view-categories','CategoryController@viewCategories');
	Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
	Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');

	Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
	Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
	Route::get('/admin/view-products','ProductsController@viewProducts');
	Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
	Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');

	Route::match(['get','post'],'admin/add-attributes/{id}','ProductsController@addAttributes');
	Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');


});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout','AdminController@logout');