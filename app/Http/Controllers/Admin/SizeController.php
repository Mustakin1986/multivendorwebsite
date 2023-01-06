<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
      public function addSize()
      {
        $categories = Category::get();
        return view('backend.admin.size.add_size',compact('categories'));
      }

      public function sizeStore(Request $request)
      {
         $this->validate($request, [
            'category_id'=>'required |integer',
            'name'=>'required|string',
         ]);
         $size = new Size();
         $size->category_id = $request->category_id;
         $size->name = $request->name;
         $size->status = $request->status;
         $size->save();
         return redirect()->back()->with('success','Size Add Successfully');
      }
      public function sizeManage()
      {
        $size = Size::get();
        return view('backend.admin.size.list',compact('size'));
      }
      public function sizeDelete($id)
      {
        $sizeDelete = Size::find($id);
        $sizeDelete->delete();
        return redirect()->back()->with('success','Size has been deleted');
      }
}
