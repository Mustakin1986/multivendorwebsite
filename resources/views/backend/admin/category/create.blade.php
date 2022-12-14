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
            <h1>Add Category</h1>
                  <form action="{{ url('/store/category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                    <input type="text"name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Enter Category Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Image</label>
                    <input type="file"name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
