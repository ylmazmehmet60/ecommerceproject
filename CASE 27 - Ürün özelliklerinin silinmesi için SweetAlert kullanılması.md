	Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');

	public function deleteAttribute($id = null){
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product Attribute has been deleted successfully');
    }