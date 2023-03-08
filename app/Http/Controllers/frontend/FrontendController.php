<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $new_products = Product::with('category','color','size')->where('productType_id','1')->where('status',1)->get();
        $hot_products = Product::with('category','color','size')->where('productType_id','2')->where('status',1)->get();
        $discount_products = Product::with('category','color','size')->where('productType_id','3')->where('status',1)->get();
        return view('frontend.home.index',compact('new_products','hot_products','discount_products','sliders'));
    }

     public function productDetails($id)
     {
        $product = Product::find($id);
        return view('frontend.home.productDetails',compact('product'));
     }

    public function userLogin()
    {
      return view('frontend.user.login');
    }
    public function userRegister()
    {
      return view('frontend.user.register');
    }

}
