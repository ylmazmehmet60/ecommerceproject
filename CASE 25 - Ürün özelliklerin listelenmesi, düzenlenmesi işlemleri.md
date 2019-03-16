php artisan make:migration create_products_attributes_table
        Schema::create('products_attributes', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('product_id');
			$table->string('sku');
			$table->string('size');
			$table->float('price');
			$table->integer('stock');
            $table->timestamps();
        });
    }

php artisan make:migration

php artisan make:model ProductsAttribute


	public function addAttributes(Request $request, $id=null){
        return view('admin.products.add_attributes');
    }

resources/views/admin/products/add_attributes.blade.php
.
.
.	