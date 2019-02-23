adminin kendi parolasını düzeltebilmesi için bi form oluşturmam lazım bu formun aynı zamanda güvenlikli olmasıda lazım

ilk önce controller, view ve rota oluşturuyorum 

rota
	Route::group(['middleware' => ['auth']],function(){
		.
		.
		.
		Route::get('/admin/settings','AdminController@settings');
	});
	rotada middleware içine adresi katyıoruz 
	
	
	controller
	public function settings(){
        return view('admin.settings');
    }
	
	view - admin_design sayfasında yield tagı ile contenti çekmek isiyor 
			biz o isteğe extends ettiğimizde veri oraya gidiyor
	@extends('layouts.adminLayout.admin_design')
	@section('content')
	.
	.
	.
	@endsection
	
