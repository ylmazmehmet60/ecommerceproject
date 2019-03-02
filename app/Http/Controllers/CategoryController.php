<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
     public function addCategory(Request $request){
		if($request->isMethod('post')){
    		$data = $request->all();
    		$category = new Category;
    		$category->name = $data['name'];
    		$category->description = $data['description'];
    		$category->url = $data['url'];
    		$category->save();
			return redirect('/admin/view-categories')->with('flash_message_success','Kategori Başarıyla Eklendi');
    	}
    	return view('admin.categories.add_category');
    }
	
	public function editCategory(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url']]);
            return redirect('/admin/view-categories')->with('flash_message_success','Kategori Güncellendi');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        return view('admin.categories.edit_category')->with(compact('categoryDetails'));
    }
    public function deleteCategory(Request $request, $id = null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Kategori Silindi!');
        }
    }
	
	
	public function viewCategories(){
    	$categories = Category::get();
    	$categories = json_decode(json_encode($categories));
    	return view('admin.categories.view_categories')->with(compact('categories'));
    }
}
