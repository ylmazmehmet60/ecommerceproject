ürün lat resmi silme işlemi


Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteProductAltImage');

	 public function deleteProductAltImage($id=null){

        $productImage = ProductsImage::where('id',$id)->first();

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

        ProductsImage::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Ürün alt resmi başarıyla silindi!');
    }
	
 <td class="center"><a id="delImage" rel="{{ $image->id }}" rel1="delete-alt-image" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Sil</a></td>

 