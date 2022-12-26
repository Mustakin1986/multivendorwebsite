<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;

class BrandController extends Controller
{
    public function addBrand()
    {
        $categories = Category::get();
        return view('backend.admin.brand.addbrand', compact('categories'));
    }

    public function brandStore(Request $request)
    {
             $this->validate($request,[
            'category_id'=>'required |integer',
            'name'=>'required |string'
          ]);
          $brand = new Brand();
          $brand->category_id = $request->category_id;
          $brand->name =  $request->name;
          $brand->slug = str_replace(' ','_',strtolower($request->name));
          $brand->save();
          return redirect()->back()->with('success','Brand has been created');
        }

    public function manageBrand()
    {
        $brand = Brand::with('category')->paginate(5);
        return view('backend.admin.brand.brand_list', compact('brand'));
    }

    public function brandDelete($id)
    {
        $brandDelete = Brand::find($id);
        $brandDelete->delete();
        return redirect()->back()->with('success','Brand has been deleted');
    }

    public function brandEdit($id)
    {
        $category=Category::get();
        $brand= Brand::find($id);
        return view('backend.admin.brand.editbrand',compact('brand','category'));
    }
    public function brandUpdate(Request $request,$id)
    {
        $this->validate($request,[
            'category_id'=>'required |integer',
            'name'=>'required |string'
          ]);

          $brand = Brand::find($id);
          $brand->category_id = $request->category_id;
          $brand->name =  $request->name;
          $brand->slug = str_replace(' ','_',strtolower($request->name));
          $brand->save();
          return redirect()->back()->with('success','Brand has been Updated');
        }

}


