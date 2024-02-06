@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Writer</li>
              <li class="breadcrumb-item"><a href="#">Index</a></li>
            </ol>
        </div><!-- /.col -->
        <div class="col-sm-6 text-right">
            {{-- <button class="btn btn-success" style="float: right">Add</button> --}}
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">All Writer Table <span class="badge btn-info ">{{$writer->count()}}</span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>SL</th>
          <th>Name</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($writer as $row )
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{Str::title($row->name)}} </td>
                <td>
                    @if ($row->category==1)
                        <span class="badge badge-success">Category</span>
                    @else
                    @endif

                    @if ($row->district==1)
                        <span class="badge badge-success">District</span>
                    @else
                    @endif

                    @if ($row->post==1)
                    <span class="badge badge-success">Post</span>
                    @else
                    @endif

                    @if ($row->setting==1)
                    <span class="badge badge-success">Setting</span>
                    @else
                    @endif

                    @if ($row->gallery==1)
                    <span class="badge badge-success">Gallery</span>
                    @else
                    @endif

                    @if ($row->ads==1)
                    <span class="badge badge-success">Ads</span>
                    @else
                    @endif

                    @if ($row->role==1)
                    <span class="badge badge-success">Aole</span>
                    @else
                    @endif
                </td>
                <td>
                  <a href="{{route('category.delete',$row->id)}}" class="btn btn-danger">Delete</a>
                  <a href="{{route('edit.writer',$row->id)}}" class="btn btn-success">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>
        @if ($writer->count()==0)
        <tr class="text-danger text-center">
            <td colspan="50">NO Data Show</td>
        </tr>
        @endif
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection
