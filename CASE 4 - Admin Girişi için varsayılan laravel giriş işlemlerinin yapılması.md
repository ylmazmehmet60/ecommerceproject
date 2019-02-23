Security Token ile Admin login ve kullanıcı login oluşturma

Admin Paneli için sample isminde veritabanı oluşturuyoruz

laravel5.6\.env dosyasında
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=sample
DB_USERNAME=root
DB_PASSWORD=root
baglantı ayarlarını düzeltiyoruz 

php artisan migrate

EĞER 
[PDOException]
SQLSTATE[42000]: Syntax error or access violation: 1071...
gibi bir hata alırsan  
veritabanını yeniden oluştur ve
AppServiceProvider.php bul 
uygun yerlere 
use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}
kodlarını yapıştır ve php artisan migrate komutunu uygula

php artisan make:auth
register login için yetkilendirme scafoldu oluşturr.
	eğer hata alırsan php artisan config:clear
	veya php artisan serve --port 8010 gibi bişeyle portu değiştir.
	

view 	
POST actionu ayarlama ve securty token
method="POST" action="{{ url('admin') }}">{{ csrf_field() }}>

Routes
Route::match(['get','post'],'/admin', 'AdminController@login');

Contolller

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
             if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'admin' => '1'])) {
                echo "Başarılı"; die;
            }else{
                echo "Hata"; die;
            }
        }
        return view('admin.admin_login');
    } 
}



veri tabanı alnına yeni alan ekleme 
yeni alan ekledikten sonra git veritabanındada alan ekle kendi eklemiyo admin/boolean/null


