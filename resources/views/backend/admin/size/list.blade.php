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
       <th>Category Name</th>
       <th>Size</th>
       <th>Status</th>
     </tr>
     @foreach ($size as $row)
     <tr>
      <td>{{ $loop->index+1 }}</td>
      <td>{{ $row->category->name }}</td>
      <td>{{ $row->name }}</td>
      <td>
        @if ($row->status==0)
            <span class="badge badge-danger">Inactive</span>
            @else
            <span class="badge badge-success">Active</span>
        @endif
       </td>
      <td>
         <a href="{{ url('/size/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
         <a href="{{ url('/size/delete/'.$row->id) }}" onclick=" return confirm('Are you sure ??')" class="btn btn-sm btn-danger">Delete</a>
      </td>
    </tr>
     @endforeach
   </table>
   </div>

@endsection
