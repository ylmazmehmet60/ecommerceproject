	public function products($url=null){
    	
    	$categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
    	if($categoryCount==0){
    		abort(404);
    	}
		.
		.
		.
	}	

vendor\laravel\framework\src\Illuminate\Foundation\Exceptions\views\404.blade.php

@extends('layouts.frontLayout.front_design')

@section('content')


<div class="container text-center">
	<div class="content-404">
		<h1><b>Ooo!</b> Sayfa Bulunamadı</h1>
		<p>bu sayfa mevcut değil geri gitek istiyosan linke tıkla</p>
		<h2><a href="{{ asset('./')}}">Geri Git</a></h2><br><br>
	</div>
</div>


@endsection