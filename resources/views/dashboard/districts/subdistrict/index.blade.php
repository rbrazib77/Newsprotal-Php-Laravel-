@extends('layouts.masterdashboard')
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Sub-District Table <span class="badge btn-info ">{{count($subdistrict)}}</span></h3>
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
          <th>Sub-District Bangla</th>
          <th>Sub-District English</th>
          <th>District Name</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($subdistrict as $row )
            <tr>
                <td>{{$subdistrict->firstitem()+ $loop->index}}</td>
                <td>{{$row->subdistrict_bangla}} </td>
                <td>{{$row->subdistrict_english}}</td>
                <td>{{$row->district_bangla}}</td>
                <td>{{$row->created_at}}</td>
                <td>
                  <a href="{{route('subdistrict.delete',$row->id)}}" class="btn btn-danger">Delete</a>
                  <a href="{{route('subdistrict.edit',$row->id)}}" class="btn btn-success">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>
        @if ($subdistrict->count()==0)
        <tr class="text-danger text-center">
            <td colspan="50">NO Data Show</td>
        </tr>
        @endif
      </table>
      {{$subdistrict->links()}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
 <!-- /.modal-dialog -->
  <div class="modal fade" id="categorymodal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Sub-district Add</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('subdistrict.store')}}" role="form">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Sub-district Bangla</label>
                    <input type="text" class="form-control" name="subdistrict_bangla" id="exampleInputEmail1" placeholder="Category Bangla">
                    @error('subdistrict_bangla')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Sub-district English</label>
                    <input type="text" class="form-control" name="subdistrict_english" id="exampleInputPassword1" placeholder="Category English">
                    @error('subdistrict_english')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Choose District</label>
                    <select class="form-control" name="district_id">
                        <option disabled="" selected="">==Choose District==</option>
                        @foreach ($district as $row)
                        <option  value="{{$row->id}}">{{$row->district_english}} | {{$row->district_bangla}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Sub-District</button>
            </form>
        </div>
    </div>
  </div>
@endsection

