Route::match(['get', 'post'],'/cart','ProductsController@cart');


views/product/cart.blade



		
	 CONTROLLER		
		
	 public function addtocart(Request $request){
        $data = $request->all();
		
		if(empty($data['user_email'])){
            $data['user_email'] = '';    
        } 
  

		$session_id = Session::get('session_id');
        if(!isset($session_id)){
            $session_id = str_random(40);
            Session::put('session_id',$session_id);
        }
		
		$sizeIDArr = explode('-',$data['size']);
		$product_size = $sizeIDArr[1];
		
         DB::table('cart')
        ->insert(['product_id' => $data['product_id'],'product_name' => $data['product_name'],
            'product_code' => $data['product_code'],'product_color' => $data['product_color'],
            'price' => $data['price'],'size' => $product_size,'quantity' => $data['quantity'],'user_email' => $data['user_email'],'session_id' => $session_id]);
	
		 return redirect('cart')->with('flash_message_success','Ürün Karta Eklendi!!');
			
    }    
	
	 public function cart(){
		  $session_id = Session::get('session_id');
          $userCart = DB::table('cart')->where(['session_id' => $session_id])->get(); 
		  echo "<pre>"; print_r($userCart);
		 return view('products.cart');
	}