<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;

use Image;
use App\Category;
use App\Product;
use App\ProductsAttribute;
use App\ProductsImage;


use DB;


class ProductsController extends Controller{
    public function addProduct(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		if(empty($data['category_id'])){
    			return redirect()->back()->with('flash_message_error','Under Category is missing!');	
    		}
    		$product = new Product;
    		$product->category_id = $data['category_id'];
    		$product->product_name = $data['product_name'];
    		$product->product_code = $data['product_code'];
    		$product->product_color = $data['product_color'];
    		if(!empty($data['description'])){
    			$product->description = $data['description'];
    		}else{
				$product->description = '';    			
    		}
    		$product->price = $data['price'];
    		if($request->hasFile('image')){
					$image_tmp = Input::file('image');
					if($image_tmp->isValid()){
						$extension = $image_tmp->getClientOriginalExtension();
						$filename = rand(111,99999).'.'.$extension;
						$large_image_path = 'images/backend_images/products/large/'.$filename;
						$medium_image_path = 'images/backend_images/products/medium/'.$filename;
						$small_image_path = 'images/backend_images/products/small/'.$filename;
						Image::make($image_tmp)->save($large_image_path);
						Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
						Image::make($image_tmp)->resize(300,300)->save($small_image_path);
						$product->image = $filename;
    			}
    		}
			
			if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
			$product->status = $status;
			
    		$product->save();
            return redirect()->back()->with('flash_message_success','Ürün Eklendi!');
    	}
    	$categories = Category::where(['parent_id'=>0])->get();
    	$categories_dropdown = "<option value='' selected disabled>Select</option>";
    	foreach($categories as $cat){
    		$categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
    		$sub_categories = Category::where(['parent_id'=>$cat->id])->get();
    		foreach ($sub_categories as $sub_cat) {
    			$categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
    		}
    	}
    	return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }
	
	public function viewProducts(){
        $products = Product::get();
        $products = json_decode(json_encode($products));
        foreach($products as $key => $val){
            $category_name = Category::where(['id'=>$val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }
        return view('admin.products.view_products')->with(compact('products'));
    }
	
	public function editProduct(Request $request,$id=null){
		if($request->isMethod('post')){
			$data = $request->all();
			
			if($request->hasFile('image')){
            	$image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/products/medium'.'/'.$fileName;  
                    $small_image_path = 'images/backend_images/products/small'.'/'.$fileName;  
	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);
                }
			}else if(!empty($data['current_image'])){
            	$fileName = $data['current_image'];
            }else{
            	$fileName = '';
            }	
			
			if(empty($data['description'])){
            	$data['description'] = '';
            }
			
			if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
			

			Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'description'=>$data['description'],'price'=>$data['price'],'image'=>$fileName,'status'=>$status]);
		
			return redirect()->back()->with('flash_message_success', 'Ürün başarıyla güncellendi');
		}
		
		$productDetails = Product::where(['id'=>$id])->first();

		$categories = Category::where(['parent_id' => 0])->get();
		$categories_drop_down = "<option value='' disabled>Select</option>";
		foreach($categories as $cat){
			if($cat->id==$productDetails->category_id){
				$selected = "selected";
			}else{
				$selected = "";
			}
			$categories_drop_down .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
			$sub_categories = Category::where(['parent_id' => $cat->id])->get();
			foreach($sub_categories as $sub_cat){
				if($sub_cat->id==$productDetails->category_id){
					$selected = "selected";
				}else{
					$selected = "";
				}
				$categories_drop_down .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";	
			}	
		}

		return view('admin.products.edit_product')->with(compact('productDetails','categories_drop_down'));
	} 

	
	public function deleteProduct($id = null){
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Ürün başarıyla silindi');
    }
	
	
		
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
	
	
    public function addAttributes(Request $request, $id=null){
        $productDetails = Product::with('attributes')->where(['id' => $id])->first();
        $productDetails = json_decode(json_encode($productDetails));
        /*echo "<pre>"; print_r($productDetails); die;*/
        $categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
        $category_name = $categoryDetails->name;
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            foreach($data['sku'] as $key => $val){
                if(!empty($val)){
                    $attrCountSKU = ProductsAttribute::where(['sku'=>$val])->count();
                    if($attrCountSKU>0){
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error', 'SKU already exists. Please add another SKU.');    
                    }
                    $attrCountSizes = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($attrCountSizes>0){
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error', 'Attribute already exists. Please add another Attribute.');    
                    }
                    $attr = new ProductsAttribute;
                    $attr->product_id = $id;
                    $attr->sku = $val;
                    $attr->size = $data['size'][$key];
                    $attr->price = $data['price'][$key];
                    $attr->stock = $data['stock'][$key];
                    $attr->save();
                }
            }
            return redirect('admin/add-attributes/'.$id)->with('flash_message_success', 'Product Attributes has been added successfully');
        }
        $title = "Add Attributes";
        return view('admin.products.add_attributes')->with(compact('title','productDetails','category_name'));
    }
	
	public function deleteAttribute($id = null){
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Özellik Başarıyla Silindi');
    }

	
	public function products($url=null){
    	
    	$categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
    	if($categoryCount==0){
    		abort(404);
    	}

    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();
    	$categoryDetails = Category::where(['url'=>$url])->first();
    	//$productsAll = Product::where(['category_id'=>$categoryDetails->id])->get();
    	if($categoryDetails->parent_id==0){
    		$subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();
    		$subCategories = json_decode(json_encode($subCategories));
    		foreach($subCategories as $subcat){
    			$cat_ids[] = $subcat->id;
    		}
    		$productsAll = Product::where(['category_id'=>$categoryDetails->id])->get();
			//degisecek
    	}else{
    		$productsAll = Product::where(['category_id'=>$categoryDetails->id])->get();
    	}
    	
    	return view('products.listing')->with(compact('categories','categoryDetails','productsAll'));
    }
	
    public function product($id = null){
        $productCount = Product::where(['id'=>$id])->count();
        if($productCount==0){
            abort(404);
        }
        $productDetails = Product::with('attributes')->where('id',$id)->first();		
        $relatedProducts = Product::where('id','!=',$id)->where(['category_id' => $productDetails->category_id])->get();
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $total_stock = ProductsAttribute::where('product_id',$id)->sum('stock');	
		$productAltImages = ProductsImage::where('product_id',$id)->get();
		
        return view('products.detail')->with(compact('productDetails','categories','total_stock','relatedProducts','productAltImages'));
    }
	 
	public function getProductPrice(Request $request){
        $data = $request->all(); 
        $proArr = explode("-",$data['idsize']);
        $proAttr = ProductsAttribute::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
        echo $proAttr->price; 
        echo "#";
        echo $proAttr->stock; 
    }

    public function addImages(Request $request, $id=null){
        $productDetails = Product::where(['id' => $id])->first();
        $categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
        $category_name = $categoryDetails->name;
        if($request->isMethod('post')){
            $data = $request->all();
            if ($request->hasFile('image')) {
                $files = $request->file('image');
                foreach($files as $file){
                    // Upload Images after Resize
                    $image = new ProductsImage;
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/products/medium'.'/'.$fileName;  
                    $small_image_path = 'images/backend_images/products/small'.'/'.$fileName;  
                    Image::make($file)->save($large_image_path);
                    Image::make($file)->resize(600, 600)->save($medium_image_path);
                    Image::make($file)->resize(300, 300)->save($small_image_path);
                    $image->image = $fileName;  
                    $image->product_id = $data['product_id'];
                    $image->save();
                }   
            }
            return redirect('admin/add-images/'.$id)->with('flash_message_success', 'Ürün Resmi Başarıyla Eklendi');
        }
        $productImages = ProductsImage::where(['product_id' => $id])->orderBy('id','DESC')->get();
        $title = "Add Images";
        return view('admin.products.add_images')->with(compact('title','productDetails','category_name','productImages'));
    }
	
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
	
	public function editAttributes(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            foreach($data['idAttr'] as $key=> $attr){
                if(!empty($attr)){
                    ProductsAttribute::where(['id' => $data['idAttr'][$key]])->update(['price' => $data['price'][$key], 'stock' => $data['stock'][$key]]);
                }
            }
            return redirect('admin/add-attributes/'.$id)->with('flash_message_success', 'Ürün Özelliği başarıyla Eklendi!!');
        }
    }
	
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
		
		$countProducts = DB::table('cart')->where(['product_id' => $data['product_id'],'product_color' => $data['product_color'],'size' => $data['size'],'session_id' => $session_id])->count();
        if($countProducts>0){
            return redirect()->back()->with('flash_message_error','Product already exist in Cart!');
        }
		
		$product_size = $sizeIDArr[1];
		
		$getSKU = ProductsAttribute::select('sku')->where(['product_id' => $data['product_id'], 'size' => $product_size])->first();

		
         DB::table('cart')
        ->insert(['product_id' => $data['product_id'],'product_name' => $data['product_name'],'product_code' => $getSKU['sku'],
            'product_code' => $data['product_code'],'product_color' => $data['product_color'],
            'price' => $data['price'],'size' => $product_size,'quantity' => $data['quantity'],'user_email' => $data['user_email'],'session_id' => $session_id]);
	
		 return redirect('cart')->with('flash_message_success','Ürün Karta Eklendi!!');
			
    }    
	
	 public function cart(){
		  $session_id = Session::get('session_id');
          $userCart = DB::table('cart')->where(['session_id' => $session_id])->get(); 
		  $userCart = DB::table('cart')->where(['session_id' => $session_id])->get(); 
		  $total_amount = 0;
          foreach($userCart as $item){
            $total_amount = $total_amount + ($item->price * $item->quantity); 
		  }
		   foreach($userCart as $key => $product){
				$productDetails = Product::where('id',$product->product_id)->first();
				$userCart[$key]->image = $productDetails->image;
			}
		 return view('products.cart')->with(compact('userCart'));
	}
	
	public function deleteCartProduct($id=null){
        DB::table('cart')->where('id',$id)->delete();
        return redirect('cart')->with('flash_message_success','Ürün Silindi!');
    }
	
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
	
	 public function checkout(Request $request){
    
        return view('products.checkout');
    }


    
}
