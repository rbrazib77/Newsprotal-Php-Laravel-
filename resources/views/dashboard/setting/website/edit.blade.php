@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Website</li>
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
        <h4 class="modal-title">Website Update </h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('update.improtantwebsite',$website->id)}}" role="form">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Website Name Bangla</label>
                <input type="text" class="form-control" name="website_name_bangla" id="exampleInputEmail1" placeholder="Website Name Bangla" value="{{$website->website_name_bangla}}">
                @error('website_name_bangla')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Website Name English</label>
                <input type="text" class="form-control" name="website_name_english" id="exampleInputEmail1" placeholder="Website Name English" value="{{$website->website_name_english}}">
                @error('website_name_english')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Website Link</label>
                <input type="text" class="form-control" name="website_link" id="exampleInputPassword1" placeholder="Category English" value="{{$website->website_link}}">
                @error('website_link')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Website Update</button>
        </form>
    </div>
</div>
@endsection

