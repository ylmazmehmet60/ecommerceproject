php artisan make:migration create_products_table

tabloyu düzelt
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_color');
            $table->text('description');
            $table->float('price');
            $table->string('image');
            $table->timestamps();
        });
		
php artisan migrate


php artisan make:controller ProductsController


php artisan make:model Product


route
Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');

contorllr eklee



resources/views/admin/products/add_product.blade.php

@extends('layouts.adminLayout.admin_design')
@section('content')
.
.
.
@endsection















