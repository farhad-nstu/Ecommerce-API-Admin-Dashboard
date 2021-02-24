<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Brand;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $categories = Category::all();
        return view('dashboard.products.index', compact('products', 'categories'));
    }

    public function create()
    {
    	$categories = Category::all();
    	$subcategories = SubCategory::all();
    	$brands = Brand::all();
    	return view('dashboard.products.create', compact('categories', 'subcategories', 'brands'));
    }

    public function store(Request $request)
    {
        $this->validate( $request, array(
            'name' => 'string|required',
            'category_id' => 'required',
			'subcategory_id' => 'required',
			'brand_id' => 'required',
			'price' => 'required',
        ) );

        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->discount_price = $request->discount_price;
        $product->hot_deal = $request->hot_deal;
        $product->size = json_encode($request->size);
        $product->color = json_encode($request->color);

        $results = [];
        $images = $request->file( 'images' );
        foreach ( $images as $image ) {
            $filename    = $image->getClientOriginalName();
            $image_resize = Image::make( $image->getRealPath() );
            $image_resize->resize( 800, 800 );
            $image_resize->save( public_path( 'images/' .$filename ) );
            array_push($results, 'images/'.$filename);
        }
        $product->image = json_encode($results);

        $product->save();
        return back()->with( 'message', 'New product added successfully' );
    }

    public function edit($id)
    {
    	$product = Product::find($id);
    	$categories = Category::all();
    	$subcategories = SubCategory::where('category_id', $product->category_id)->get();
    	$brands = Brand::all();
    	return view('dashboard.products.edit', compact('product', 'categories', 'subcategories', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $this->validate( $request, array(
            'name' => 'string|required',
            'category_id' => 'required',
			'subcategory_id' => 'required',
			'brand_id' => 'required',
			'price' => 'required',
        ) );

        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->discount_price = $request->discount_price;
        $product->hot_deal = $request->hot_deal;
        $product->size = $request->size;
        $product->color = $request->color;

        $results = [];
        if(!empty($request->images)){
	        $images = $request->file( 'images' );
	        foreach ( $images as $image ) {
	            $filename    = $image->getClientOriginalName();
	            $image_resize = Image::make( $image->getRealPath() );
	            $image_resize->resize( 800, 800 );
	            $image_resize->save( public_path( 'images/' .$filename ) );
	            array_push($results, 'images/'.$filename);
	        }

	        $currentImages = json_decode($product->image);
	        for ($i=0; $i <count($currentImages); $i++) { 
	        	array_push($results, $currentImages[$i]);
	        }

	        $product->image = json_encode($results);
        }

        $product->update();
        return redirect()->route('product.index')->with( 'message', 'Product Updated Successfully' );
    }

    public function show($id)
    {
    	$product = Product::find($id);
    	$categories = Category::all();
    	$subcategories = SubCategory::all();
    	$brands = Brand::all();
    	return view('dashboard.products.show', compact('product', 'categories', 'subcategories', 'brands'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $images = json_decode($product->image);
        foreach ($images as $image) {
        	unlink($image);
        }
        $product->delete();
        return redirect()->back()->with( 'success', 'Product deleted successfully' );
    }

    public function delete_image(Request $request)
    {
    	$product = Product::find($request->productId);
    	$newImages = [];
    	$images = json_decode($product->image);
    	for($i = 0; $i < count($images); $i++){
    		if($images[$i] == $request->image){
    			unlink($images[$i]);
    		} else {
    			array_push($newImages, $images[$i]);
    		}
    	}
    	$product->image = $newImages;
    	$product->update();
    	return view('dashboard.products.tempImage', compact('product'));
    }

    public function get_sub_category(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->catId)->get();
        return view('dashboard.products.subCategories', compact('subcategories'));
    }
}
