<?php use App\Http\Controllers\Controller;
$mainCategories =  Controller::mainCategories();
?>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +90 542 277 41 12</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> ylmazmehmet60@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ url('./')}}"><img src="{{ asset('images/frontend_images/home/logo.png') }}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									TR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									TL
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="#"><i class="fa fa-star"></i> İstekler</a></li>
								<li><a href=""><i class="fa fa-crosshairs"></i> Siparişler</a></li>
								<li><a href=""><i class="fa fa-shopping-cart"></i> Sepet</a></li>
									<li><a href=""><i class="fa fa-lock"></i> Giriş</a></li>
									<li><a href=""><i class="fa fa-user"></i> Hesap</a></li>
									<li><a href=""><i class="fa fa-sign-out"></i> Çıkış</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html" class="active">Ana</a></li> 
								<li class="dropdown"><a href="#">Alışveriş<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    	@foreach($mainCategories as $cat)
											@if($cat->status==1)
												<li><a href="{{ asset('products/'.$cat->url) }}">{{ $cat->name }}</a></li>
											@endif
										@endforeach
                                    </ul>
                                </li>
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog Listesi</a></li>
										<li><a href="blog-single.html">Tekil Blog</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">İletişim</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="" method="post">
								<input type="text" placeholder="Ara..." name="product" />
								<button type="submit" style="border:0px; height:33px; margin-left:-3px">Go</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->