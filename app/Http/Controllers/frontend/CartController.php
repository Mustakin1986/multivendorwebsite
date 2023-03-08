<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addToCart(Request $request){
      $addToCart = new Cart();
      $addToCart->user_id=auth()->user()->id;
      $addToCart->vendor_id=$request->vendor_id;
      $addToCart->product_id=$request->product_id;
      $addToCart->price=$request->price;
      $addToCart->qty=1;
      $addToCart->total_price=1*$request->price;
      $addToCart->save();
      return redirect()->back()->withSuccess('product has been add to cart');
    }
    public function checkout()
    {
        $Products =Cart::with('products')->where('user_id',auth()->user()->id)->get();
       return view('frontend.checkout.checkout',compact('Products'));
    }
    public function cartUpdate(Request $request, $id){
     $cartProductUpdate = Cart::find($id);
     $cartProductUpdate->qty = $request->qty;
     $cartProductUpdate->save();
     return redirect()->back()->withSuccess('Cart product has been Updated');
    }

    public function cartProductDelete($id)
    {
        $cartProduct= Cart::find($id);
        $cartProduct->delete();
        return redirect()->back()->withSuccess('Cart product has been Deleted');
    }

    public function orderComplete( Request $request)
    {
     $order=new Order();
     $order->product_id=$request->product_id;
     $order->vendor_id=$request->vendor_id;
     $order->user_id=auth()->check() ? auth()->user()->id : 1;
     $order->total_price=$request->total_price;
     $order->total_qty=$request->total_qty;
     $order->save();

     if($order->save()){
      $orderDetails= new OrderDetails();
      $orderDetails->order_id = $order->id;
      $orderDetails->name = $request->name;
      $orderDetails->email = $request->email;
      $orderDetails->phone = $request->phone;
      $orderDetails->address = $request->address;
      $orderDetails->save();
     }

     $product = Product::where('id',$order->product_id)->first();
     $product->qty= $product->qty-$request->total_qty;
     $product->save();

    $cartEmpty= Cart::where('user_id',auth()->user()->id)->get();
     foreach($cartEmpty as $cart){
        $cart->delete();
     }
     return redirect('/')->withSuccess('Your order has been Completed');
    }
}
