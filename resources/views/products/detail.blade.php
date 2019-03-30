@extends('layouts.frontLayout.front_design')

@section('content')

<section>
		<div class="container">
			<div class="row">
			@if(Session::has('flash_message_error'))
	            <div class="alert alert-error alert-block" style="background-color:#d7efe5">
	                <button type="button" class="close" data-dismiss="alert">×</button> 
	                    <strong>{!! session('flash_message_error') !!}</strong>
	            </div>
	        @endif   
				<div class="col-sm-3">
					@include('layouts.frontLayout.front_sidebar')	
				</div>
				
				<div class="col-sm-9 padding-right">

					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
								<a id="mainImgLarge" href="{{ asset('/images/backend_images/products/large/'.$productDetails->image) }}">
									<img style="width:300px" id="mainImg" src="{{ asset('/images/backend_images/products/medium/'.$productDetails->image) }}" alt="" />
								</a>
								</div>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										@if(count($productAltImages)>0)
										<div class="item active thumbnails">
												@foreach($productAltImages as $altimg)
													<a href="{{ asset('images/backend_images/products/medium/'.$altimg->image) }}" data-standard="{{ asset('images/backend_images/products/small/'.$altimg->image) }}">
										  				<img class="changeImage" style="width:80px; cursor:pointer" src="{{ asset('images/backend_images/products/small/'.$altimg->image) }}" alt="">
													</a>
												@endforeach
										</div>
										@endif
									</div>
							</div>
						</div>
						<div class="col-sm-7">
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
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#description" data-toggle="tab">Açıklama</a></li>
								<li><a href="#care" data-toggle="tab">Metaryal</a></li>
								<li><a href="#delivery" data-toggle="tab">Teslimat</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="description" >
								<div class="col-sm-12">
									<p>{{ $productDetails->description }}</p>
								</div>	
							</div>
							
							<div class="tab-pane fade" id="care" >
								<div class="col-sm-12">
									<p>{{ $productDetails->care }}</p>
								</div>
							</div>
							
							<div class="tab-pane fade" id="delivery" >
								<div class="col-sm-12">
									<p>100% Orijinal Ürün <br>
									Nakit Ödeme Yapabilirsiniz</p>
								</div>
							</div>
					
							
						</div>
					</div><!--/category-tab-->
					
				</div>
			</div>
		</div>
	</section>	

@endsection