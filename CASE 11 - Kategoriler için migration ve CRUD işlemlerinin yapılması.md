tablolar için migration oluşturuyorum

php artisan make:migration create_category_table

oluşan dosyayı açıp alanları ekliyorum

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('name');
            $table->text('description');
            $table->string('url');
            $table->tinyInteger('status');
            $table->rememberToken();
            $table->timestamps();
        });
		
php artisan migrate
kodunu yazıp veritabanında güncelliyorum


kategoriler için contollr oluşturuyorum 
php artisan make:controller CategoryController		


model oluşturoyuzm
php artisan make:model Category



ve keteegory controller içine 
	use App\Category;
     public function addCategory(Request $request){
		if($request->isMethod('post')){
    		$data = $request->all();
    		$category = new Category;
    		$category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
    		$category->description = $data['description'];
    		$category->url = $data['url'];
    		$category->save();
    	}
    	return view('admin.categories.add_category');
	}
fonksiyonunu ekliyorum	


kategoriler için route ekliyorum
Route::group(['middleware' => ['auth']],function(){
	Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
	
	
view için resources/views/admin/categories/add_category.blade.php dosyası olutşuruyorum
. . . içine html kodları yazıyotum
@extends('layouts.adminLayout.admin_design')
@section('content')
.
<form class="form-horizontal" method="post" action="{{ url('/admin/add-category') }}" name="add_category" id="add_category" novalidate="novalidate"> {{ csrf_field() }}

.
.
@endsection
	
cok gerekli değil ama matrix.form_validation içine 
 $("#add_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

ekliyorum	
	
	

		
		
		