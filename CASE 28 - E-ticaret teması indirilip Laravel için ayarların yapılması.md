php artisan make:controller IndexController


dışa gelecek rota
Route::get('/','IndexController@index');

class IndexController extends Controller{
	public function index(){
		return view('index');
	}
}	
	
view içine index.blade.php oluşturdum	
	