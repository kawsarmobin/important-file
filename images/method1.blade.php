{{-- Store function --}}
$product = new Product();

$product_image = $request->image;
$product_image_new_name = time() . '_' . $product_image->getClientOriginalName();
$product_image->move('uploads\products', $product_image_new_name);

$product->name = $request->name;
$product->price = $request->price;
$product->image = $product_image_new_name; or $product->image = 'uploads\products\' . $product_image_new_name;
$product->description = $request->description;

$product->save();

Session::flash('success', 'Product create successfull.');
return redirect()->back();


{{-- Update function --}}
