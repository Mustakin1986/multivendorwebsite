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
                <th>Price</th>
                <th>Qty</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </table>
      </div>
    </div>
@endsection
