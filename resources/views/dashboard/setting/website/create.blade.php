@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">improtant Website</li>
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
      <h3 class="card-title">improtant Website <span class="badge btn-info "></span></h3>
      <button type="button" class="btn btn-success" style="float: right" data-toggle="modal" data-target="#categorymodal">
        Add New
      </button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>SL</th>
          <th>Website Name Bangla</th>
          <th>Website Name English</th>
          <th>Website Link</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($website as $row )
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$row->website_name_bangla}} </td>
                <td>{{$row->website_name_english}} </td>
                <td>{{$row->website_link}}</td>
                <td>
                    @if ($row->status==1)
                    <a href="{{route('deactive.improtantwebsite',$row->id)}}" style="float:right" class="btn btn-success">Active</a>
                    @else
                    <a href="{{route('deactive.improtantwebsite',$row->id)}}" style="float:right" class="btn btn-danger">Deactive</a>
                    @endif
                    {{$row->status}}
                </td>
                <td>{{$row->created_at}}</td>
                <td>
                  <a href="{{route('delete.improtantwebsite',$row->id)}}" class="btn btn-danger">Delete</a>
                  <a href="{{route('edit.improtantwebsite',$row->id)}}" class="btn btn-success">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>
        @if ($website->count()==0)
        <tr class="text-danger text-center">
            <td colspan="50">NO Data Show</td>
        </tr>
        @endif
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
 <!-- /.modal-dialog -->
  <div class="modal fade" id="categorymodal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Website Add </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('store.improtantwebsite')}}" role="form">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Website Name Bangla</label>
                    <input type="text" class="form-control" name="website_name_bangla" id="exampleInputEmail1" placeholder="Website Name Bangla">
                    @error('website_name')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Website Name English</label>
                    <input type="text" class="form-control" name="website_name_english" id="exampleInputEmail1" placeholder="Website Name English">
                    @error('website_name_english')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Website Link</label>
                    <input type="text" class="form-control" name="website_link" id="exampleInputPassword1" placeholder="Website Link">
                    @error('website_link')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">status</label>
                    <select name="status" class="form-control" id="">
                        <option selected>====Choose Option====</option>
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                    @error('status')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Website</button>
            </form>
        </div>
    </div>
  </div>
@endsection
