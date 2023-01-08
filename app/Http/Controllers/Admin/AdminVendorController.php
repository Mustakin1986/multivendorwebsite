<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

}
