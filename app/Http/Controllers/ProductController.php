<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use App\Relationship;

class ProductController extends Controller
{
    public function category($slug)
    {
    	$category = ProductCategory::where('slug','=',$slug)->first();
        if (!empty($category)) {
            $products = Relationship::where('parent_id',$category->id)->where('parent_type','product_category')->with('product')->paginate(8);
            return view('products.category', ['products' => $products]);
        }
        else {
            abort(404);
        }
    }

    public function product($slug)
    {
    	$product = Product::where('slug',$slug)->with('comments.user')->first();
        if (! empty($product)) {
            return view('products.product', compact('product'));
        }
    	else {
            abort(404);
        }
    }
}
