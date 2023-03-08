@extends('backend.master')
@section('content')
  <div class="container-fluid">
   <div class="col-md-12">
   <table class=" table table-bordered">
     <tr>
       <th>Sl</th>
       <th>Name</th>
       <th>Category Name</th>
       <th>Action</th>
     </tr>
     @foreach ($subcategories as $row)
     <tr>
      <td>{{ $loop->index+1 }}</td>
      <td>{{ $row->category->name }}</td>
      <td>{{ $row->name }}</td>
      <td>
         <a href="{{ url('/subcategory/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
         <a href="{{ url('/subcategory/delete/'.$row->id) }}" onclick=" return confirm('Are you sure ??')" class="btn btn-sm btn-danger">Delete</a>
      </td>
    </tr>
     @endforeach
   </table>
   </div>
   {{ $subcategories->links() }}

@endsection
