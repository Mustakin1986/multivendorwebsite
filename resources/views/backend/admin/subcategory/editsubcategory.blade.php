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
            <h1>Update Sub Category</h1>
                  <form action="{{ url('/subcategory/update/'.$subcategory->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Select Category Name</label>
                        <select class="form-control" name="category_id">
                            @foreach ( $category as $rows )
                            <option class="selected" value="{{ $rows->id }}" selected >{{ $rows->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label"></label>
                    <input type="text" name="name" Value="{{ $subcategory->name }}"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Enter Sub Category Name">
                   </div>
                  <button type="submit" class=" btn btn-block btn-success">Update</button>
                  </form>
           </div>
         </div>
       </div>
       <div class="col-md-3"></div>
     </div>
   </div>

@endsection
