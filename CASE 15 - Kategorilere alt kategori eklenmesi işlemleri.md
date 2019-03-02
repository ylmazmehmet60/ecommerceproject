kategori controller 
     public function addCategory(Request $request){
		if($request->isMethod('post')){
    		$data = $request->all();
    		$category = new Category;
    		$category->name = $data['name'];
			 $category->parent_id = $data['parent_id'];
    		$category->description = $data['description'];
    		$category->url = $data['url'];
    		$category->save();
			return redirect('/admin/view-categories')->with('flash_message_success','Kategori Başarıyla Eklendi');
    	}
 bu   	$levels = Category::where(['parent_id'=>0])->get();
 bu   	return view('admin.categories.add_category')->with(compact('levels'));
    }
	public function editCategory(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url']]);
            return redirect('/admin/view-categories')->with('flash_message_success','Kategori Güncellendi');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
 bu      return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));
    }
    public function deleteCategory(Request $request, $id = null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Kategori Silindi!');
        }
    }
	
views/admin/categories/add_category.blade.php
			  <div class="control-group">
                <label class="control-label">Kategori Seviyesi</label>
                <div class="controls">
                  <select name="parent_id" style="width: 220px;">
                    <option value="0">Main Category</option>
                    @foreach($levels as $val)
                      <option value="{{ $val->id }}">{{ $val->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>	