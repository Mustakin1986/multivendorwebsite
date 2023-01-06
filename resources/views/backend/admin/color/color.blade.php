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
            <h1>Colour Name</h1>
                  <form action="{{ url('/store/color') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Select A Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="" disabled selected>Select A Category</option>
                            @foreach ( $categories as $row)
                            <option value="{{ $row->id}}">{{ $row->name }}</option>
                            @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Add Color</label>
                    <input type="text"name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Enter Colour Name">
                   </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Status</label>
                     <select name="status" id="" class="form-control">
                          <option value="" disabled selected>Select Status</option>
                          <option value="0">Inactive</option>
                          <option value="1">Active</option>
                     </select>
                   </div>
                  <button type="submit" class=" btn btn-block btn-success">Add Color</button>
                  </form>
           </div>
         </div>
       </div>
       <div class="col-md-3"></div>
     </div>
   </div>

@endsection
