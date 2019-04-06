	public function updateCartQuantity($id=null,$quantity=null){
        $getCartDetails = DB::table('cart')->where('id',$id)->first();
        $getProductStock = ProductsAttribute::where('sku',$getCartDetails->product_code)->first();
        $updated_quantity = $getCartDetails->quantity+$quantity;
        if($getProductStock->stock>=$updated_quantity){
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity); 
            return redirect('cart')->with('flash_message_success','Ürünler başarıyla güncellendi');   
        }else{
            return redirect('cart')->with('flash_message_error','Gereken ürün adeti bulunamadı');    
        }
    }
	
	
	Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');
	
	
	
	totocart
			$countProducts = DB::table('cart')->where(['product_id' => $data['product_id'],'product_color' => $data['product_color'],'size' => $data['size'],'session_id' => $session_id])->count();
        if($countProducts>0){
            return redirect()->back()->with('flash_message_error','Product already exist in Cart!');
        }
		