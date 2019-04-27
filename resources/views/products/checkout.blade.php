@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form" style="margin-top:20px;"><!--form-->
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb" style="
    margin-bottom: 5px;
">
			  <li><a href="#">Ana</a></li>
			  <li class="active">Alınacak Ürünler</li>
			</ol>
		</div>
		@if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
		@endif
		
				<div class="col-sm-12 col-sm-offset-1">
					
						
	<div class="container">
    <div class="row">
	<div class="col-xs-2 col-md-3">
	</div>
        <div class="col-xs-10 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Ödeme Detayları
                    </h3>
                    <div class="checkbox pull-right">
                        <label>
                            <input type="checkbox" />
                            Hatırla
                        </label>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form">
                    <div class="form-group">
                        <label for="cardNumber">
                            KART NUMARASI</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="kart numarası"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth">
                                    SKT</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CVC</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                
                   
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span>4200</span> Ödenecek Tutar</a>
                </li>
            </ul>
            <br/>
            <a href="http://www.jquery2dotnet.com" class="btn btn-success btn-lg btn-block" role="button">ÖDE</a>
        </div>
    </div>
</div>
					</div><!--/login form-->
				</div>
				
		

		</form>
	</div>
</section><!--/form-->

@endsection