@extends('backend.master')
@section('content')
  <div class="container-fluid">
   <div class="col-md-12">
     <div class="row">
       <div class="col-md-3"></div>
       <div class="col-md-6">
                @if (session()->has('success'))
                <div class=" alert alert-success">{{ session()->get('success')}}</div>
                @endif
         <div class="card">
           <div class="card-body">
            <h1>Add Product Type</h1>
                  <form action="{{ url('/store/productType') }}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Product Type</label>
                    <input type="text"name="productType" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Enter Category Name">
                  </div>
                  <button type="submit" class=" btn btn-block btn-success">Create</button>
                  </form>
           </div>
         </div>
       </div>
       <div class="col-md-3"></div>
     </div>
   </div>

@endsection
