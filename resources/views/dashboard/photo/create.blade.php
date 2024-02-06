@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Photo</li>
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
      <h3 class="card-title">Photo<span class="badge btn-info "></span></h3>
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
          <th>title</th>
          <th>photo</th>
          <th>type</th>
          <th>Status</th>
          <th>Time</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($photo as $row )
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$row->title_bangla}}</td>
                <td>{{$row->title_english}}</td>
                <td>
                    <img src="{{asset('photos_gallery/')}}/{{$row->photo}}" style="height: 80px; width:80px">
                </td>
                <td>
                    @if ($row->type==1)
                        <span class="badge badge-success">Big Photo</span>
                    @else
                    <span class="badge badge-success">Small Photo</span>
                    @endif
                </td>
                    <td>
                        @if ($row->status==1)
                        <a href="{{route('activedeactive.photo',$row->id)}}" style="float:center" class="btn btn-success">Active</a>
                        @else
                        <a href="{{route('activedeactive.photo',$row->id)}}" style="float:center" class="btn btn-danger">Deactive</a>
                        @endif
                    </td>

                <td>{{$row->created_at}} </td>
                <td>
                  <a href="{{route('delete.photo',$row->id)}}" class="btn btn-danger">Delete</a>
                  <a href="{{route('edit.photo',$row->id)}}" class="btn btn-success">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>
        @if ($photo->count()==0)
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
          <h4 class="modal-title">New Photo Add </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('store.photo')}}" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Title Bangla</label>
                    <input type="text" class="form-control" name="title_bangla" id="exampleInputEmail1" placeholder="Title Bangla">
                    @error('title_bangla')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Title English</label>
                    <input type="text" class="form-control" name="title_english" id="exampleInputEmail1" placeholder="Title English">
                    @error('title_english')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file" class="form-control" name="photo" id="exampleInputPassword1">
                    @error('photo')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Type</label>
                    <select class="form-control" name="type"  required>
                        <option value="1">Big Photo</option>
                        <option value="0">Small Photo</option>
                    </select>
                    @error('type')
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
                <button type="submit" class="btn btn-primary">Add Photo</button>
            </form>
        </div>
    </div>
  </div>
@endsection

