@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Districts</li>
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
            </ol>
        </div><!-- /.col -->
        <div class="col-sm-6 text-right">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">District Update </h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('district.update',$districts->id)}}" role="form">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">District Bangla</label>
                <input type="text" class="form-control" name="district_bangla" id="exampleInputEmail1" placeholder="Category Bangla" value="{{$districts->district_bangla}}">
                @error('district_bangla')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">District English</label>
                <input type="text" class="form-control" name="district_english" id="exampleInputPassword1" placeholder="Category English" value="{{$districts->district_english}}">
                @error('district_english')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">District Update</button>
        </form>
    </div>
</div>
@endsection

