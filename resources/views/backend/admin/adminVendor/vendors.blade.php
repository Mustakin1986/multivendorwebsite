@extends('backend.master')
@section('content')
<div class="container-fluid" style="height: auto">
    <div class="well">
        <h1 style="color: black">Vendors List</h1>
        <table class="table table-bordered">
        <tr>
            <th>Sl</th>
            <th>Vendor Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ( $vendors as $row)
             <td>{{ $loop->index+1}}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->phone }}</td>
            <td>
                @if($row->is_approved==0)
                    <span class="badge badge-danger">Pending</span>
                @else
                <span class="badge badge-success">Approved</span>
                @endif
            </td>
            <td>
                @if ($row->is_approved==0)
                <a href="{{ url('/admin/vendor/approved/'.$row->id) }}" class="btn btn-sm btn-success">Approved</a>
                @else
                <a href="{{ url('/admin/vendor/pending/'.$row->id) }}" class="btn btn-sm btn-warning">Pending</a>
                @endif
                <a href="{{ url('/admin/vendor/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach

        </table>
  </div>
</div>
@endsection
