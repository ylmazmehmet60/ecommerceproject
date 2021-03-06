<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','IndexController@index');

Route::match(['get','post'],'/admin', 'AdminController@login');


//KATEGORİ/LİSTELEME
Route::get('/products/{url}','ProductsController@products');

Route::get('/product/{id}','ProductsController@product');


//SEPET
Route::match(['get', 'post'],'/cart','ProductsController@cart');
Route::match(['get', 'post'], '/add-cart', 'ProductsController@addtocart');

Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');

Route::any('/get-product-price','ProductsController@getProductPrice');

Auth::routes();

Route::get('/login-register','UsersController@userLoginRegister');
Route::post('user-login','UsersController@login');
Route::post('/user-register','UsersController@register');
Route::get('confirm/{code}','UsersController@confirmAccount');
Route::get('/user-logout','UsersController@logout'); 



Route::group(['middleware' => ['auth']],function(){
	Route::get('/admin/dashboard','AdminController@dashboard');	
	Route::get('/admin/settings','AdminController@settings');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
	Route::match(['get','post'],'account','UsersController@account');
	Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
	Route::get('/admin/view-categories','CategoryController@viewCategories');
	Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
	Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
	Route::match(['get','post'],'checkout','ProductsController@checkout');
	Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
	Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
	Route::get('/admin/view-products','ProductsController@viewProducts');
	Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
	Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
	Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');

	Route::match(['get', 'post'], '/admin/add-images/{id}','ProductsController@addImages');

	Route::match(['get','post'],'admin/add-attributes/{id}','ProductsController@addAttributes');
	Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');
	Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteProductAltImage');
	
	Route::match(['get', 'post'], '/admin/edit-attributes/{id}','ProductsController@editAttributes');




});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout','AdminController@logout');