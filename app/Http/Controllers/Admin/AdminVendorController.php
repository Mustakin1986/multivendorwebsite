<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdminVendorController extends Controller
{
   public function vendors()
   {
      $vendors = Vendor::orderBy('created_at','desc')->get();
     return view('backend.admin.adminVendor.vendors',compact('vendors'));
   }
   public function vendorApproved($id)
   {
    $vendor =Vendor::find($id);
    $vendor->is_approved=1;
    $vendor->save();
    return redirect()->back()->with('success','Vendor has been approved');

   }
   public function vendorPending($id)
   {
    $vendor =Vendor::find($id);
    $vendor->is_approved=0;
    $vendor->save();
    return redirect()->back()->with('error','Vendor has been Pending');

   }
   public function vendorProducts()
   {
    $products = Product::with('category','color','size')->orderBy('created_at','desc')->Paginate(5);
    return view('backend.admin.adminVendor.vendorProduct',compact('products'));
   }
   public function productApproved($id)
   {
    $product = Product::find($id);
    $product->status=1;
    $product->save();
    return redirect()->back()->with('success','Product has been approved');
   }

   public function productPending($id)
   {
    $product = Product::find($id);
    $product->status=0;
    $product->save();
    return redirect()->back()->with('error','Product has been Pending');
   }
   public function productDelete($id)
   {
     $productDelete=Product::find($id);
     if($productDelete){
        $imageDelete = public_path('/product/'.$productDelete->image);
        if(File::exists($imageDelete)){
           File::delete($imageDelete);
        }
    }
     $productDelete->Delete();
     return redirect()->back()->with('error','Product has been Deleted');
   }
}

