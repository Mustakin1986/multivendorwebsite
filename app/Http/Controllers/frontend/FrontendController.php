<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
         $categories = Category:: with('Subcategory')->get();
        return view('frontend.home.index', Compact('categories'));
    }
}
