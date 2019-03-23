Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');

	
	public function deleteProductImage($id=null){

		$productImage = Product::where('id',$id)->first();

		$large_image_path = 'images/backend_images/products/large/';
		$medium_image_path = 'images/backend_images/products/medium/';
		$small_image_path = 'images/backend_images/products/small/';
		
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }
        
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        Product::where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_message_success', 'Ürün Resmi Başarıyla Silindi!!');
	}