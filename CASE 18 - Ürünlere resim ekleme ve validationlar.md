resim ekleme için composer ekliyoruz

git bash 
php composer.phar require intervention/image

add_product.blade formu için elemanı ekliyoırzzz 
<form enctype="multipart/form-data" 


product contorller

use Illuminate\Support\Facades\Input;
use Image;
 public function addProduct(Request $request){
 .
 .
 .
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
			

images/backend_images/products/small/
images/backend_images/products/medium/
images/backend_images/products/large/	
klasörleri olşturuyoruzz		
			
			
			
			
			
			
			
			
