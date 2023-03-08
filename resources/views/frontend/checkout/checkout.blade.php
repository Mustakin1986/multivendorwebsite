@extends('frontend.master')
@section('content')
<div class="content">
    <div class="cart-items">
         <div class="container">
          <h2 style="color: black">My Shopping bag</h2>
           <div class="cart-header">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $sum=0;
                        $qty=0;
                    @endphp
                    @foreach ($Products as $row )
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $row->products->name }}</td>
                         <td>
                            <img src="{{asset('/product/'.$row->products->image)}}" height="50" width="50"/>
                        </td>
                        <td>{{ $row ->price }}</td>
                        <td>
                            <form action="{{url('/cart/product/update/'.$row->id) }}" method="post">
                             @csrf
                               <input type="number" name="qty" value="{{ $totalqty=$row->qty }}"/>

                               <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>
                        </td>
                        <td> {{ $totalPrice = $row->price * $row->qty }}</td>
                        <td>
                            <a href="{{ url('/cartProduct/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @php
                        $sum+=$totalPrice;
                        $qty+=$totalqty;
                    @endphp
                    @endforeach
                    <tr>
                        <td colspan="5" style="text-align:right">Grand Total Price</td>
                        <td colspan="1">{{ $sum }}</td>
                        <td colspan="1"></td>
                    </tr>
                 </table>
           </div>
         </div>
      </div>
    </div>

    <div class="user_info">
        <h2>
            <center>Shipping and Billing Information </center>
         </h2>
         <div class="col-md-12">
            <div class="row">
                 <div class="col-md-2"></div>
                 <form action="{{ url('/customer/details') }}" method="post">
                    @csrf
                    @foreach ($Products as $row  )
                       <input  type="hidden" name="product_id" value="{{$row->product_id }}" />
                       <input  type="hidden" name="vendor_id" value="{{$row->vendor_id }}" />
                    @endforeach
                     <input  type="hidden" name="total_price" value="{{ $sum }}" />
                     <input type="hidden" name="total_qty" value="{{$qty }}" />
                     <div class="user_form">
                        <div class="col-md-8">
                            <div class="form-group">
                                 <input type="text" name="name" class="form-control" value="{{ auth()->check() ? auth()->user()->name :old('name')}}" placeholder=" Enter your name"/>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" value="{{ auth()->check() ? auth()->user()->email :old('email')}}" placeholder=" Enter your name"/>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control" value="{{ auth()->check() ? auth()->user()->phone :old('phone')}}" placeholder=" Enter your Phone"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control"  name="address" placeholder=" Enter your Address">{{ auth()->check() ? auth()->user()->address :old('address')}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-block btn-parimary">Submit</button>
                        </div>

                     </div>
                </form>
                 <div class="col-md-2"></div>
            </div>
         </div>
        </div>
    </div>
    </div>
</div>
@endsection

