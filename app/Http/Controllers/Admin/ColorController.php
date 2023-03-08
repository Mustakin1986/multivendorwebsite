<?php

namespace App\Http\Controllers\Admin;
use App\Models\Color;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    public function addColor()
    {
      $categories = Category::get();
       return view('backend.admin.color.color', compact('categories'));
    }

    public function colorStore(Request $request)
    {
        $this->validate($request, [
            'category_id'=>'required |integer',
            'name'=>'required|string',
         ]);
        $color = new Color();
        $color->category_id = $request->category_id;
        $color->name = $request->name;
        $color->status = $request->status;
        $color->save();
        return redirect()->back()->with('success','Color Add Successfully');
    }
    public function colorManage()
    {
        $color = Color::get();
        return view('backend.admin.color.list', compact('color'));
    }
    public  function colorDelete($id)
    {
        $colorDelete = Color::find($id);
        $colorDelete->delete();
        return redirect()->back()->with('success','Color has been deleted');
    }
    public function colorEdit($id)
    {
        $colorEdit = Color::find($id);
        $categories  = Category::get();
        return view("backend.admin.color.edit",compact('colorEdit','categories'));
    }
    public function colorUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'category_id'=>'required |integer',
            'name'=>'required|string',
         ]);
        $color = Color::find($id);
        $color->category_id = $request->category_id;
        $color->name = $request->name;
        $color->status = $request->status;
        $color->save();
        return redirect()->back()->with('success','Color Update Successfully');
    }
 }

