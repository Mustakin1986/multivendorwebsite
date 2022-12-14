@extends('backend.master')
@section('content')
  <div class="container-fluid">
   <div class="col-md-12">
    @if (session()->has('success'))
        <div class=" alert alert-success">{{ session()->get('success')}}</div>
        @endif
   <table class=" table table-bordered">
     <tr>
       <th>Sl</th>
       <th>Name</th>
       <th>Image</th>
       <th>Action</th>
     </tr>
     @foreach ($categories as $row)
     <tr>
      <td>{{ $loop->index+1 }}</td>
      <td>{{ $row->name }}</td>
      <td>
         <img src="{{ asset('/Category/'. $row->image ) }}" height="30" width="30"/>
      </td>
      <td>
         <a href="{{ url('/category/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
         <a href="{{ url('/category/delete/'.$row->id) }}" onclick=" return confirm('Are you sure ??')" class="btn btn-sm btn-danger">Delete</a>
      </td>
    </tr>
     @endforeach
   </table>
   </div>

@endsection
