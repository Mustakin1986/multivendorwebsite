<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class CategoryController extends Controller
{
  public function categorycreate()
  {
    return view('backend.admin.Category.create');
  }
  public function categoryManage(){
    $categories = Category::get();
    return view('backend.admin.category.list',compact('categories'));
  }

  public function storeCategory(Request $request)
  {
   $this->validate($request, [
      'name'=>'required|string',
      'image'=>'required',
   ]);

   if($request->file('image')){
    $name = time().'.'.$request->image->extension();
    $request->image->move(public_path('/Category/'),$name);

   }

   $category= new Category();
   $category->name = $request->name;
   $category->slug=str_replace(' ','-',strtolower($request->name));
  $category->image = $name;
  $category->save();
  return redirect()->back()->with('success','Category has been created');
  }

  public function categoryDelete($id)
  {
    $categoryDelete = Category::find($id);
    if($categoryDelete){
        $imageDelete = public_path('/Category/'.$categoryDelete->image);
        if(File::exists($imageDelete)){
           File::delete($imageDelete);
        }
    }
    $categoryDelete->delete();
    return redirect('/category/manage')->with('success','category has been deleted');
  }

  public function categoryEdit($id)
  {
    $category= Category::find($id);
    return view('backend.admin.category.edit',compact('category'));
  }

  public function categoryUpdate(Request $request,$id)
        {
            $this->validate($request, [
            'name'=>'required|string',
        ]);
            $category = Category::find($id);
            if(isset($request->image)){
            if( $category->image && file_exists('Category/'.$category->image)){
                unlink('Category/'. $category->image);
            }
            $updateImage = time().'.'.$request->image->extension();
            $request->image->move(public_path('/Category/'),$updateImage);
            $category->image = $updateImage;
            }
            $category->name = $request->name;
        $category->slug=str_replace(' ','-',strtolower($request->name));
        $category->save();
        return redirect('/category/manage')->with('success','category has been Updated');
        }
}
