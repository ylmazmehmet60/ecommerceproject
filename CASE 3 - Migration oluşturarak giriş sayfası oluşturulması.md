php artisan make:controller AdminController
		
	controller
		laravel5.6\app\Http\Controllers\AdminController.php
		class AdminController extends Controller
		{
			 public function login(){
				return view('admin.admin_login'); //admin klasorü içinde admin_login.blade.php sayfası
			 }	 
		}
	
	view
		laravel5.6\resources\views\admin\admin.blade.php sayfasına yönlendirir.

	route
		laravel5.6\routes\web.php
		localhost:800/admin sayfasında AdminController içindeki login fonsiyonunu çalıştır 
		Route::get('/admin', 'AdminController@login');
		
	assets
		laravel5.6\public içerisine css/backend_css, js/backend_js gibi dizinler oluiturup
		viewlerde 
		href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" gibi bir yol tanımlıyoruz
		
		
		
		
		

