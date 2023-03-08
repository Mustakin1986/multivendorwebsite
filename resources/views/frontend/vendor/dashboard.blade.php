@extends('frontend.master')
@section('content')
    <div class="container" style="height: auto">
        <div class="well">
            <h1 style="color: black">Products List</h1>
            <a href="{{ url('/vendor/product/create') }}" class="btn btn-sm btn-success pull-right" style="margin-bottom:10px">Add Product</a>
            <table class="table table-bordered">
            <tr>
                <th>Sl</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ( $product as $row)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>
                    <img src="{{asset('/product/'.$row->image)}}" height="50" width="50"/>
                </td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->category->name }}</td>
                <td>{{ $row->price }}</td>
                <td>{{ $row->qty }}</td>
                <td>
                    @if($row->status==0)
                        <span class="badge badge-danger">Pending</span>
                    @else
                    <span class="badge badge-success">Approved</span>
                    @endif
                </td>
                <td>
                    <a href="{{ url('/vendor/product/edit'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ url('/vendor/product/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach

            </table>
            {{ $product->links()}}
      </div>
    </div>
@endsection
