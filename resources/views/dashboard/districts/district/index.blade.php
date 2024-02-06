@extends('layouts.masterdashboard')
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">District Table <span class="badge btn-info ">{{$districts->count()}}</span></h3>
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
          <th>District Bangla</th>
          <th>District English</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($districts as $row )
            <tr>
                <td>{{$districts->firstitem()+ $loop->index}}</td>
                <td>{{$row->district_bangla}} </td>
                <td>{{$row->district_english}}</td>
                <td>{{$row->created_at}}</td>
                <td>
                  <a href="{{route('district.delete',$row->id)}}" class="btn btn-danger">Delete</a>
                  <a href="{{route('district.edit',$row->id)}}" class="btn btn-success">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>
        @if ($districts->count()==0)
        <tr class="text-danger text-center">
            <td colspan="50">NO Data Show</td>
        </tr>
        @endif
      </table>
      {{$districts->links()}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
 <!-- /.modal-dialog -->
  <div class="modal fade" id="categorymodal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Districts Add </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('district.store')}}" role="form">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">District Bangla</label>
                    <input type="text" class="form-control" name="district_bangla" id="exampleInputEmail1" placeholder="District Bangla">
                    @error('district_bangla')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">District English</label>
                    <input type="text" class="form-control" name="district_english" id="exampleInputPassword1" placeholder="District English">
                    @error('district_english')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add District</button>
            </form>
        </div>
    </div>
  </div>
@endsection
