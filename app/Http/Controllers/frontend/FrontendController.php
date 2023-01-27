<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $new_products = Product::with('category','color','size')->where('productType_id','2')->where('status',1)->get();
        $hot_products = Product::with('category','color','size')->where('productType_id','1')->where('status',1)->get();
        $discount_products = Product::with('category','color','size')->where('productType_id','3')->where('status',1)->get();
        return view('frontend.home.index',compact('new_products','hot_products','discount_products'));
    }

    public function userLogin()
    {
      return view('frontend.user.auth');
    }
    public function userRegister()
    {
      return view('frontend.user.auth');
    }
}
