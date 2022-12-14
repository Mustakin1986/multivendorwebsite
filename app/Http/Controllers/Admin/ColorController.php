<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function add_color()
    {
       return view('backend.admin.color.color');
    }

    public function store_color(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string',
         ]);

        $color = new Color();
        $color->name = $request->name;
        $color->save();
        return redirect()->back()->with('success','Color Add Successfully');
    }
}
