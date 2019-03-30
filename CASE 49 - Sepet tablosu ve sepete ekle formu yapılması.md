php artisan make:migration create_cart_table

        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_color');
            $table->string('size');
			$table->string('price');
            $table->integer('quantity');
            $table->string('user_email');
			$table->string('session_id');
            $table->timestamps();
        });
		
php artisan migrate	


detail.blade.php
							<form name="addtoCartForm" id="addtoCartForm" action="{{ url('add-cart') }}" method="post">{{ csrf_field() }}
		                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
		                        <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
		                        <input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
		                        <input type="hidden" name="product_color" value="{{ $productDetails->product_color }}">
		                        <input type="hidden" name="price" id="price" value="{{ $productDetails->price }}">
								<div class="product-information"><!--/product-information-->
									<img src="images/product-details/new.jpg" class="newarrival" alt="" />
									<h2>{{ $productDetails->product_name }}</h2>
									<p>Ürün Kodu: {{ $productDetails->product_code }}</p>
									<p>
										<select id="selSize" name="size" style="width:150px;" required>
											<option value="">Select</option>
											@foreach($productDetails->attributes as $sizes)
											<option value="{{ $productDetails->id }}-{{ $sizes->size }}">{{ $sizes->size }}</option>
											@endforeach
										</select>	
									</p>
									<img src="images/product-details/rating.png" alt="" />
									<span>
										<span id="getPrice">$ {{ $productDetails->price }}</span>
										<label>Miktar:</label>
										<input name="quantity" type="text" value="1" />
										
										@if($total_stock>0)
											<button type="submit" class="btn btn-fefault cart" id="cartButton">
												<i class="fa fa-shopping-cart"></i>
												Sepete Ekle
											</button>
										@endif	
										
									</span>
									<p>
										<b>Stok:</b>
										<span id="Availability"> @if($total_stock>0) Stokta @else Stokta Değil @endif</span>
									</p>
									<p><b>Durum:</b> YENİ</p>
			
									<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								</div><!--/product-information-->
							</form>
							
							
							
Route::match(['get', 'post'], '/add-cart', 'ProductsController@addtocart');



	 public function addtocart(Request $request){
        $data = $request->all();
		
		if(empty($data['user_email'])){
            $data['user_email'] = '';    
        } 
  

		if(empty($data['session_id'])){
            $data['session_id'] = '';    
        }
		
		$sizeIDArr = explode('-',$data['size']);
		$product_size = $sizeIDArr[1];
		
         DB::table('cart')
        ->insert(['product_id' => $data['product_id'],'product_name' => $data['product_name'],
            'product_code' => $data['product_code'],'product_color' => $data['product_color'],
            'price' => $data['price'],'size' => $product_size,'quantity' => $data['quantity'],'user_email' => $data['user_email'],'session_id' => $data['session_id']]);

    }    							
							
							
							
							
							
							
							
							
							
