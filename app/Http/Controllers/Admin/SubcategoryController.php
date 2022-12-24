<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function subcategoryCreate()
    {
        $categories = Category::get();
     return view('backend.admin.subcategory.createsubcategory',compact('categories'));
    }

    public function subcategoryStore(Request $request)
    {
      $this->validate($request,[
        'category_id'=>'required |integer',
        'name'=>'required |string'
      ]);
      $subcategory = new Subcategory();
      $subcategory->category_id = $request->category_id;
      $subcategory->name =  $request->name;
      $subcategory->slug = str_replace(' ','_',strtolower($request->name));
      $subcategory->save();
      return redirect()->back()->with('success','subcategory has been created');
    }
    public function subcategoryManage()
    {
        $subcategories = Subcategory::with('category')->paginate(5);
        return view('backend.admin.subcategory.listsubcategory', compact('subcategories'));
     }

     public function subcategoryEdit($id)
     {
       $category=Category::get();
       $subcategory= Subcategory::find($id);
       return view('backend.admin.subcategory.editsubcategory', compact('subcategory','category'));
     }

     public function subcategoryDelete($id)
     {
        $subcategoryDelete = Subcategory::find($id);
        $subcategoryDelete->delete();
        return redirect()->back()->with('success','subcategory has been deleted');
     }
     public function subcategoryUpdate(Request $request, $id)
     {
        $this->validate($request,[
            'category_id'=>'required |integer',
            'name'=>'required |string'
          ]);
          $subcategory = Subcategory::find($id);
          $subcategory->category_id = $request->category_id;
          $subcategory->name =  $request->name;
          $subcategory->slug = str_replace(' ','_',strtolower($request->name));
          $subcategory->save();
          return redirect()->back()->with('success','subcategory has been Updated');
        }
 }

