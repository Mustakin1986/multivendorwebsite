<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductTypeController extends Controller
{
    public function ProductType()
    {
     return view('backend.admin.ProductType.Create');
    }
    public function ProductTypeAdd( Request $request)
    {
            $this->validate($request, [
            'productType'=>'required|string',
        ]);
        $addProductType = New ProductType();
        $addProductType->productType = $request->productType;
        $addProductType->Save();
        return redirect()->back()->with('success','Product Type has been created');
    }
}
