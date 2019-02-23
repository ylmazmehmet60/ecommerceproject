
1. yöntem

admin panelinede admin sessionu varmı die bakacaz
controller 
admin login fonsksiyonuna authdan sonra sessionu oluşturuyoruz böylece biri giriş yaptıgında admin ise session oluşturuyo
Session::put('adminSession',$data['email']);


ve dashboard admin/dashboard adresine girildiğinde dashboard() fonksiyonu çalıştıgında içine 
		if(Session::has('adminSession')){
        }else{
            return redirect('/admin')->with('flash_message_error','Erişmek için giriş yapın');
        }
        return view('admin.dashboard');
		
yapıtırıyoruz böylece session yoksa dashborada girişte yetki koymus olduk

2. yöntem
laravelin middleware sisni kullanrak ta yapabilirz 
	rota 
		Route::group(['middleware' => ['auth']],function(){
			Route::get('/admin/dashboard','AdminController@dashboard');	
		});
	\app\Http\Middleware\RedirectIfAuthenticated.php içine 
	