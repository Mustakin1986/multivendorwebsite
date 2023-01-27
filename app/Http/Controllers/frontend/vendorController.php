<?php

namespace App\Http\Controllers\Frontend;
use Session;
use App\Models\Size;
use App\Models\Color;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductType;
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

            public function vendorLogout()
            {
             session()->flush();
             return redirect('/')->with('success','you are Logout');
            }

            public function vendorDashboard()
            {
                $product = Product::with('category','color','size')->where('vendor_id', session()->get('vendorId'))->orderBy('created_at','desc')->Paginate(5);
                return view('frontend.vendor.dashboard', compact('product'));
            }
            public function vendorProductCreateForm()
            {
                $categories = Category::get();
                $colors = Color::get();
                $sizes = Size::get();
                $productType = ProductType::get();
                return view('frontend.vendor.create',compact('categories','colors','sizes','productType'));
            }

            public function vendorProductStore(Request $request)
            {
                if($request->file('image')){
                    $name = time().'.'.$request->image->extension();
                    $request->image->move(public_path('/product/'), $name);
            }

            $product = new Product();
            $product->category_id = $request->category_id;
            $product->vendor_id = session()->get('vendorId');
            $product->color_id = $request->color_id;
            $product->size_id = $request->size_id;
            $product->productType_id = $request->productType_id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->image = $name;

            if($request->hasFile('multi_image')){
                foreach($request->file('multi_image') as $images ){
                    $imagesName =rand(999,9999).'.'.$images->extension();
                    $images->move(public_path('/gallery/'),$imagesName);
                    $data[]=$imagesName;
                }
            }
            $product->multi_image = json_encode($data);
            $product->save();
            return redirect()->back()->with('success','Product has be created');
         }
}
