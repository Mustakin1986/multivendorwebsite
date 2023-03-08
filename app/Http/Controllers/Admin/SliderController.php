<?php

namespace App\Http\Controllers\admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function sliderForm()
    {
     return view('backend.admin.slider.create');
    }

    public function addSlider(Request $request)
    {
         $this->validate($request, [
        'name'=>'required|string',
        'slider'=>'required',
        ]);

        if($request->file('slider')){
            $name = time().'.'.$request->slider->extension();
            $request->slider->move(public_path('/Slider/'),$name);

           }
           $slider= new Slider();
           $slider->name = $request->name;
           $slider->slider = $name;
           $slider->save();
          return redirect()->back()->with('success','Slider has been Add');

    }
}
