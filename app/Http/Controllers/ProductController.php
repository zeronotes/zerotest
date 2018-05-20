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
    	$products = Relationship::where('parent_id',$category->id)->where('parent_type','product_category')->paginate(8);
    	return view('products.category', ['products' => $products]);
    }

    public function product($slug)
    {
    	$product = Product::where('slug',$slug)->first();
    	return view('products.product', compact('product'));
    }
}
