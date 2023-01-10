@extends('backend.master')
@section('content')
    <div class="container-fluid" style="height: auto">
        <div class="well">
            <h1 style="color: black">Vendor Products List</h1>
            <table class="table table-bordered">
            <tr>
                <th>Sl</th>
                <th>Image</th>
                <th>Vendor Name</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($products as $row)
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
                @if ($row->status==0)
                <a href="{{ url('/vendor/product/approved/'.$row->id) }}" class="btn btn-sm btn-success">Approved</a>
                @else
                <a href="{{ url('/vendor/product/pending/'.$row->id) }}" class="btn btn-sm btn-warning">Pending</a>
                @endif
                <a href="{{ url('/vendor/product/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach

            </table>
      </div>
    </div>
@endsection
