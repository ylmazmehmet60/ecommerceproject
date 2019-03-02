Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');


    public function deleteCategory(Request $request, $id = null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Kategori başarıyla silindi.');
        }
    }
	
views/admin/categories/view_categories.blade.php
<a id="delCat" href="{{ url('/admin/delete-category/'.$category->id) }}" class="btn btn-danger btn-mini">Delete</a>
