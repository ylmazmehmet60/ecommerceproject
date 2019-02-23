hata mesajı göstermek için 

		view 
        @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif   
		
		controller
		eğer giriş başarısızsa
			return redirect('/admin')->with('flash_message_error','Geçersiz Kullanıcı adı veya Parola');
			
			
çıkış yapmak için

	view
	href="{{ url('/logout')}}"
	
	routes
	Route::get('/logout','AdminController@logout');
	
	controller
	use Session;
    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged out Successfully'); 
    }			