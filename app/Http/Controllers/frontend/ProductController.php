<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Setting;
use App\Models\ProductFeature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function index()
    // {
    // $products=Product::all();
    // $settings=Setting::first();
    // $productfeatures=ProductFeature::all();
    // return view("frontend.products",compact("products","settings","productfeatures"));
    // }
    public function index($slug)
    {
        $settings = Setting::first();

        $products = Product::where("slug",$slug)->first();
      



        return view("frontend.product-view",compact("products","settings"));
    }
}
