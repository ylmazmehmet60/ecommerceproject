Route::match(['get', 'post'], '/admin/add-images/{id}','ProductsController@addImages');

	public function addImages(Request $request, $id=null){
        $productDetails = Product::where(['id' => $id])->first();
        return redirect()->back()->with('flash_message_success', 'eklendi');
   }
   
   
resources\views\admin\products\add_images.php



php artisan make:model ProductsImage