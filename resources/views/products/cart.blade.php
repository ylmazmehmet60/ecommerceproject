@extends('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Ana</a></li>
				  <li class="active">Kart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				@if(Session::has('flash_message_success'))
		            <div class="alert alert-success alert-block">
		                <button type="button" class="close" data-dismiss="alert">×</button> 
		                    <strong>{!! session('flash_message_success') !!}</strong>
		            </div>
		        @endif
		        @if(Session::has('flash_message_error'))
		            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
		                <button type="button" class="close" data-dismiss="alert">×</button> 
		                    <strong>{!! session('flash_message_error') !!}</strong>
		            </div>
        		@endif   
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Ürün</td>
							<td class="description"></td>
							<td class="price">Fiyat</td>
							<td class="quantity">Miktar</td>
							<td class="total">Toplam</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $total_amount = 0; ?>
						@foreach($userCart as $cart)
							<tr>
								<td class="cart_product">
									<a href=""><img style="width:100px;" src="{{ asset('/images/backend_images/products/small/'.$cart->image) }}" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href="">{{ $cart->product_name }}</a></h4>
									<p>Ürün Kodu: {{ $cart->product_code }}</p>
								</td>
								<td class="cart_price">
									<p>$ {{ $cart->price }}</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href="{{ url('/cart/update-quantity/'.$cart->id.'/1') }}"> + </a>
										<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2">
										@if($cart->quantity>1)
											<a class="cart_quantity_down" href="{{ url('/cart/update-quantity/'.$cart->id.'/-1') }}"> - </a>
										@endif
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">$ {{ $cart->price*$cart->quantity }}</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="{{ url('/cart/delete-product/'.$cart->id) }}"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<p>Toplam Ödemeniz Gereken Miktar</p>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="total_area" style="margin-bottom: 10px;">
					<ul>
						<li>Toplam <span>$ <?php echo $total_amount; ?></span></li>
						
					</ul>
					
				</div>
				<a class="btn btn-default check_out pull-right" href="{{ url('/checkout') }}">Ödeme Yap</a>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

@endsection