@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Sub District</li>
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
            </ol>
        </div><!-- /.col -->
        <div class="col-sm-6 text-right">
            {{-- <button class="btn btn-success" style="float: right">Add</button> --}}
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Sub District Update </h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('subdistrict.update',$subdistricts->id)}}" role="form">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Sub District Bangla</label>
                <input type="text" class="form-control" name="subdistrict_bangla" id="exampleInputEmail1" placeholder="Category Bangla" value="{{$subdistricts->subdistrict_bangla}}">
                @error('subdistrict_bangla')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Sub District English</label>
                <input type="text" class="form-control" name="subdistrict_english" id="exampleInputPassword1" placeholder="Category English" value="{{$subdistricts->subdistrict_english}}">
                @error('subdistrict_english')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Choose District</label>
                <select class="form-control" name="district_id">
                    <option disabled="" selected="">==Choose District==</option>
                    @foreach ($district as $row)
                    <option  value="{{$row->id}}" <?php if($row->id==$subdistricts->district_id)echo"selected" ?> >{{$row->district_bangla}} | {{$row->district_english}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Sub-District Update</button>
        </form>
    </div>
</div>
@endsection


