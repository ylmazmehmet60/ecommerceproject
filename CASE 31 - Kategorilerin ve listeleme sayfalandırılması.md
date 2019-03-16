bu sayfada kategori eklerkenki url isimlerini
kullanrak linkten verilere erişeceğizz

	public function products($url=null){
    	
    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();
    	$categoryDetails = Category::where(['url'=>$url])->first();
    	$productsAll = Product::where(['category_id'=>$categoryDetails->id])->get();

    	
    	return view('products.listing')->with(compact('categories','categoryDetails','productsAll'));
    }
	
	
	<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				@include('layouts.frontLayout.front_sidebar')
			</div>
			
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">
						@if(!empty($search_product))
							{{ $search_product }} Item
						@else
							{{ $categoryDetails->name }} Items
						@endif
					</h2>
					@foreach($productsAll as $pro)
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{ asset('/images/backend_images/product/small/'.$pro->image) }}" alt="" />
										<h2>$ {{ $pro->price }}</h2>
										<p>{{ $pro->product_name }}</p>
										<a href="{{ url('/product/'.$pro->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$ {{ $pro->price }}</h2>
											<p>{{ $pro->product_name }}</p>
											<a href="{{ url('/product/'.$pro->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Sepete Ekle</a>
										</div>
									</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Listeye Ekle</a></li>
									<li><a href="#"><i class="fa fa-plus-square"></i>Karşılaştır</a></li>
								</ul>
							</div>
						</div>
					</div>
					@endforeach
					
					
				</div><!--features_items-->
				
			</div>
		</div>
	</div>
</section>

@endsection



//KATEGORİ/LİSTELEME
Route::get('/products/{url}','ProductsController@products');
