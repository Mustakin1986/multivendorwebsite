<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function subcategoryCreate()
    {
        $categories = Category::get();
     return view('backend.admin.subcategory.createsubcategory',compact('categories'));
    }
}
