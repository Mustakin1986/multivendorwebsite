<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.home.index');
    }
}
