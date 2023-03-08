@extends('frontend.master')
@section('content')

<div class="container" style="height: auto; margin-top:20px;">
    <style>
        label{
            color: black
        }
    </style>
    <div class="well">
        <h1 class="text-center" style="color: black"> Product Create</h1>
        <a href="{{ url('/vendor/dashboard') }}" class="btn btn-sm btn-success pull-right" style="margin-top:-30px">Produt List</a>
         <form action="{{url('/vendor/product/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                   <label>Category</label>
                    <select class="form-control" name="category_id">
                     <option  selected disabled> Select A Category</option>
                     @foreach ( $categories as $row )
                     <option value="{{$row->id }}">{{ $row->name }}</option>
                     @endforeach
                   </select>
                </div>
                <div class="form-group">
                    <label>Color</label>
                     <select class="form-control" name="color_id">
                      <option  selected disabled> Select A Color</option>
                      @foreach ( $colors as $row )
                      <option value="{{$row->id}}">{{ $row->name }}</option>
                      @endforeach
                    </select>
                 </div>
                 <div class="form-group">
                    <label>Size</label>
                     <select class="form-control" name="size_id">
                      <option  selected disabled> Select A Size</option>
                      @foreach ( $sizes as $row )
                      <option value="{{$row->id}}">{{$row->name }}</option>
                      @endforeach
                    </select>
                 </div>
                 <div class="form-group">
                    <label>Product Type</label>
                     <select class="form-control" name="productType_id">
                      <option  selected disabled> Select A product Type </option>
                      @foreach ( $productType as $row )
                      <option value="{{$row->id}}">{{$row->productType }}</option>
                      @endforeach
                    </select>
                 </div>
                 <div class="form-group">
                    <label>Product Name</label>
                     <input type="text" name="name" Value="{{ old('name')}}" class="form-control" placeholder=" Product Name"/>
                 </div>
                 <div class="form-group">
                    <label>Price</label>
                     <input type="text" name="price" Value="{{ old('price')}}" class="form-control" placeholder="Product Price"/>
                 </div>
                 <div class="form-group">
                    <label>Qty</label>
                     <input type="number" min="1" name="qty" Value="{{ old('qty')}}" class="form-control" placeholder="Product Qty"/>
                 </div>
                 <div class="form-group">
                    <label>Image</label>
                     <input type="file" name="image" class="form-control"/>
                 </div>
                 <div class="form-group">
                    <label>Gallary Image</label>
                     <input type="file" name="multi_image[]"  multiple class="form-control"/>
                 </div>
                <button type="sumit" class="btn btn-sm btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection
