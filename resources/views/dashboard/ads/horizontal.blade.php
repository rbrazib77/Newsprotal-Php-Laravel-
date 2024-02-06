@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Ads</li>
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
      <h3 class="card-title">Ads Table <span class="badge btn-info "></span></h3>
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
          <th>Ads</th>
          <th>Type</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($ads as $row )
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>
                    @if ($row->type==2)
                    <img src="{{asset('ads_image/')}}/{{$row->ads}}" style="height: 70px; width:300px">
                    @else
                    <img src="{{asset('ads_image/')}}/{{$row->ads}}" style="height: 100px; width:100px">
                    @endif

                </td>
                <td>
                    @if ($row->type==2)
                    Horizontal
                    @else
                    Vertical
                    @endif
                </td>
                <td>{{$row->created_at}}</td>
                <td>
                  <a href="{{route('horizontalverticalads.delete',$row->id)}}" class="btn btn-danger">Delete</a>
                  <a href="{{route('horizontalverticalads.edit',$row->id)}}" class="btn btn-success">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>
        @if ($ads->count()==0)
        <tr class="text-danger text-center">
            <td colspan="50">NO Data Show</td>
        </tr>
        @endif
        {{-- <tfoot>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
        </tfoot> --}}
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
          <h4 class="modal-title">New  Insert Ads </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('horizontalverticalads.store')}}" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Ads Link</label>
                    <input type="text" class="form-control" name="link" id="exampleInputEmail1" placeholder="ads link">
                    @error('link')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ads Image</label>
                    <input type="file" class="form-control" name="ads" id="exampleInputPassword1">
                    @error('ads')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ads Type</label>
                   <select class="form-control" name="type" id="">
                    <option value="" selected="" disabled="">Select Type</option>
                    <option value="2">Horizontal</option>
                    <option value="1">Vertical</option>
                   </select>
                    @error('ads')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Ads</button>
            </form>
        </div>
    </div>
  </div>
@endsection
