<?php

namespace App\Http\Controllers\Frontend;
use Session;
use App\Models\Color;
use App\Models\Size;
use App\Models\Vendor;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class vendorController extends Controller
{
                public function vendorRegister()
                {
                return view('frontend.vendor.auth');
                }

                public function vendorRegistration(Request $request)
                {
                $this->validate($request,[
                        'name'=>'required|string',
                        'email'=>'required',
                        'phone'=>'required',
                        'address'=>'required',
                        'logo'=>'required',
                        'password'=>'required',
                    ]);

                    if($request->file('logo')){
                        $name = time().'.'.$request->logo->extension();
                        $request->logo->move(public_path('/logo/'), $name);
                    }

                $vendor= new Vendor();
                $vendor->name =  $request->name;
                $vendor->email =  $request->email;
                $vendor->phone =  $request->phone;
                $vendor->address = $request->address;
                $vendor->password = bcrypt($request->password);
                $vendor->logo = $name ;
                $vendor-> Save();
                return redirect()->back()->with('success','registration successful,Please wait for admin approval');

            }

            public function vendorLogin(Request $request)
            {
                $vendor = Vendor::where('email',$request->email)->first();
                if($vendor->is_approved==0){
                return redirect()->back()->with('error','approved pending');
                }
                if(!$vendor){
                    return redirect()->back()->with('error','your are not valid vendor, please register');
                }else{
                    if(password_verify($request->password,$vendor->password)){
                        Session::put('vendorId',$vendor->id);
                        Session::put('vendorName',$vendor->name);
                        return redirect('/vendor/dashboard');
                    }else{
                        return redirect()->back()->with('error','password not match');
                    }
                }
            }
            public function vendorDashboard()
            {
                return view('frontend.vendor.dashboard');
            }
            public function vendorProductCreateForm()
            {
                $categories = Category::get();
                $colors = Color::get();
                $sizes = Size::get();
                return view('frontend.vendor.create',compact('categories','colors','sizes'));
            }

            public function vendorProductStore(Request $request)
            {
                if($request->file('image')){
                    $name = time().'.'.$request->image->extension();
                    $request->image->move(public_path('/product/'),$name);
            }

            $product = new product();
            $product->category_id = $request->category_id;
            $product->vendor_id = session()->get('vendorId');
            $product->color_id = $request->color_id;
            $product->size_id = $request->size_id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->image = $request->$name;
         }
}
