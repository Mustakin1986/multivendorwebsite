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
        $products = Product::with('category','color','size')->where('status',1)->get();
        return view('frontend.home.index',compact('products'));
    }
}
