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
            <h1>Add Brand</h1>
                  <form action="{{ url('/brand/store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Select Category Name</label>
                        <select class="form-control" name="category_id">
                            <option class="seleted disabled">Select A Catagory </option>
                            @foreach ($categories as $rows)
                              <option value="{{ $rows->id }}">{{ $rows->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label"></label>
                    <input type="text"name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Enter Brand Name">
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
