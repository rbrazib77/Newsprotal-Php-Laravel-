@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">User Role</li>
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
        <h4 class="modal-title">Insert User </h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('store.writer')}}" role="form">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="name">
                @error('name')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="email">
                @error('email')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
             <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                @error('password')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label for="exampleInputPassword1">Category</label>
                    <input type="checkbox" class="form-control" name="category" id="exampleInputPassword1" value="1">
                </div>
                <div class="form-group col-lg-3">
                    <label for="exampleInputPassword1">District</label>
                    <input type="checkbox" class="form-control" name="district" id="exampleInputPassword1" value="1">
                </div>
                <div class="form-group col-lg-3">
                    <label for="exampleInputPassword1">Post</label>
                    <input type="checkbox" class="form-control" name="post" id="exampleInputPassword1" value="1">
                </div>
                <div class="form-group col-lg-3">
                    <label for="exampleInputPassword1">Setting</label>
                    <input type="checkbox" class="form-control" name="setting" id="exampleInputPassword1" value="1">
                </div>
                <div class="form-group col-lg-3">
                    <label for="exampleInputPassword1">Gallery</label>
                    <input type="checkbox" class="form-control" name="gallery" id="exampleInputPassword1" value="1">
                </div>
                <div class="form-group col-lg-3">
                    <label for="exampleInputPassword1">Ads</label>
                    <input type="checkbox" class="form-control" name="ads" id="exampleInputPassword1" value="1">
                </div>
                 <div class="form-group col-lg-3">
                    <label for="exampleInputPassword1">Role</label>
                    <input type="checkbox" class="form-control" name="role" id="exampleInputPassword1" value="1">
                </div>
                {{-- <div class="form-group col-lg-3">
                    <label for="exampleInputPassword1">Writer</label>
                    <input type="checkbox" class="form-control" disabled="" checked="" name="type" id="exampleInputPassword1">
                </div> --}}
            </div>
            <br><hr>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
