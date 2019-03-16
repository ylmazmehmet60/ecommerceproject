<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class IndexController extends Controller
{
    public function index(){
		$productsAll = Product::get();
		return view('index')->with(compact('productsAll'));
	}
}
