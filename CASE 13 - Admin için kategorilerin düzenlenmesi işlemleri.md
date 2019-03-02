resources/views/admin/categories/edit_category.blade.php

Route::group(['middleware' => ['auth']],function(){

	Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
	
contorller

	public function editCategory(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url']]);
            return redirect('/admin/view-categories')->with('flash_message_success','Kategori Güncellendi');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        return view('admin.categories.edit_category')->with(compact('categoryDetails'));
    }	