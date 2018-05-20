<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
    public function index()
    {
    	//$new_products = Product::limit(8)->get();
    	$new_products = Product::paginate(8);
    	$hot_products = Product::limit(8)->orderBy('id', 'DESC')->get();
    	//dd($hot_products);
    	return view('pages.index')
    	->with([
    		'new_products' => $new_products, 
    		'hot_products' => $hot_products
    	]);
    }

    public function about()
    {
    	return view('pages.about');
    }

    public function contact()
    {
    	return view('pages.contact');
    }
}
