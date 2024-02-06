@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Category</li>
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
        <h4 class="modal-title">Category Update </h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('category.update',$categorys->id)}}" role="form">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Category Bangla</label>
                <input type="text" class="form-control" name="category_bangla" id="exampleInputEmail1" placeholder="Category Bangla" value="{{$categorys->category_bangla}}">
                @error('category_bangla')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Category English</label>
                <input type="text" class="form-control" name="category_english" id="exampleInputPassword1" placeholder="Category English" value="{{$categorys->category_english}}">
                @error('category_english')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Category Update</button>
        </form>
    </div>
</div>
@endsection
