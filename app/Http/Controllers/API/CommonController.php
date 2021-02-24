<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Brand;
use App\Product;
use DB;
use App\Wishlist;
use Auth;
use App\Cart;

class CommonController extends Controller
{
    public function get_categories()
    {
    	$categories = Category::all();
    	return response()->json($categories);
    }

    public function get_subcategories()
    {
    	$subcategories = SubCategory::all();
    	return response()->json($subcategories);
    }

    public function get_brands()
    {
    	$brands = Brand::all();
    	return response()->json($brands);
    }

    public function get_hotdeals_products()
    {
    	$products = Product::where('hot_deal', 1)->orderBy('id', 'desc')->take(6)->get();
    	return response()->json($products);
    }

    public function get_top_products()
    {
    	$products = Product::orderBy('sale', 'desc')->get();
    	return response()->json($products);
    }

    public function get_recent_products()
    {
    	$products = Product::orderBy('id', 'desc')->get();
    	return response()->json($products);
    }

    public function get_single_product($id)
    {
    	$product = DB::table('products')
    				->join('categories', 'products.category_id', 'categories.id')
    				->join('sub_categories', 'products.subcategory_id', 'sub_categories.id')
    				->join('brands', 'products.brand_id', 'brands.id')
    				->select('products.*', 'categories.title as category', 'sub_categories.title as subcategory', 'brands.title as brand')
    				->where('products.id', $id)
    				->first();
        $colors = json_decode($product->color);
        $sizes = json_decode($product->size);
    	return response()->json(['product' => $product, 'colors' => $colors, 'sizes' => $sizes]);
    }

    public function add_wishlist($productId)
    {
    	$userId = Auth::user()->id;
    	$check = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();
    	if($check){
    		return response()->json([
    			'message' => "Already Exist In Your Card"
    		], 200); 
    	} else {
    		$wish = new Wishlist;
	    	$wish->user_id = $userId;
	    	$wish->product_id = $productId;
	    	$wish->save();
	    	return response()->json([
	    		'message' => 'Add To Your Wishlist',
	    		'result' => $wish
	    	]); 
    	}
    }

    public function add_to_cart(Request $request, $productId)
    {
        $product = Product::find($productId);
        $userId = Auth::user()->id;
        $check = DB::table('carts')->where('user_id', $userId)->where('product_id', $productId)->first();
        if($check){
            $data = [
                    'qty' => $request->qty,
                    'size' => $request->size,
                    'color' => $request->color,
                    'subtotal' => $check->price*$request->qty
                ];

                DB::table('carts')->where('id', $check->id)->update($data);
                return response()->json("Cart Updated Successfully");
        } else {
            $data = [];
            $data = [
                'product_id' => $productId,
                'user_id' => $userId,
                'product_name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->price,
                'size' => $request->size,
                'color' => $request->color,
                'subtotal' => $product->price*$request->qty
            ];

            DB::table('carts')->insert($data);
            return response()->json("Product Add To Cart Successfully");
        }
    }

    public function update_cart(Request $request, $cartId)
    {
        $cartProduct = Cart::find($cartId);
        $data = [
                'qty' => $request->qty,
                'size' => $request->size,
                'color' => $request->color,
                'subtotal' => $cartProduct->price*$request->qty
            ];

            DB::table('carts')->where('id', $cartId)->update($data);
            return response()->json("Cart Updated Successfully");
    }
}
