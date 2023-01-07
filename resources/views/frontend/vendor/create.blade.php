@extends('frontend.master')
@section('content')

<div class="container">
   <div class="well">
        <div class="form-row">
        <form action="{{ url('/vendor/product/store') }}" method="POST" enctype="multipart/form-data">
            <div class="input-group " style="color: black">
               <label>Product Name</label>
                <input type="text" name="name" valu="{{ old('name') }}" class="form-control">
            </div>
                <div class="input-group mb-3" style="color:black">
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Category</label>
                    </div>
                    <select class="custom-select">
                    <option selected disabled>Select A Category</option>
                    @foreach ( $categories as $row )
                        <option value="{{ $row->id }}">{{$row->name}}</option>
                    @endforeach
                    </select>
                </div>
              <div class="input-group mb-3" style="color:black">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Color</label>
                </div>
                <select class="custom-select">
                  <option selected disabled >Select Color</option>
                  @foreach ( $colors as $row)
                  <option value="{{ $row->id }}">{{$row->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="input-group mb-3" style="color:black">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Size</label>
                </div>
                <select class="custom-select">
                  <option selected disabled>Select Size</option>
                  @foreach ( $sizes as $row)
                  <option value="{{ $row->id }}">{{$row->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="input-group " style="color: black">
                <label>Price</label>
                 <input type="text" name="price" value="{{ old('price') }}" class="form-control">
             </div>
             <div class="input-group " style="color: black">
                <label>Qty</label>
                 <input type="text" name="price" class="form-control">
             </div>
                <div class="form-group" style="color:black">
                  <label for="exampleFormControlFile1">Image</label>
                  <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                 <div class="form-group" style="color:black">
                    <label for="exampleFormControlFile1">Gallary</label>
                    <input type="file" name="multi_image[]" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>
   </div>
</div>
@endsection
