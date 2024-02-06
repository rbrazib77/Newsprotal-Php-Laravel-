@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Sco Setting</li>
              <li class="breadcrumb-item"><a href="#">Update</a></li>
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
        <h4 class="modal-title">Sco Setting </h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('sco.update',$scos->id)}}" role="form">

            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Meta Author</label>
                <input type="text" class="form-control" name="meta_author" id="exampleInputEmail1" placeholder="Meta Author" value="{{$scos->meta_author}}">
                @error('meta_author')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Meta Title</label>
                <input type="text" class="form-control" name="meta_title" id="exampleInputPassword1" placeholder="Twitter" value="{{$scos->meta_title}}">
                @error('meta_title')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Meta Keyword</label>
                <input type="text" class="form-control" name="meta_keyword" id="exampleInputPassword1" placeholder="Youtube" value="{{$scos->meta_keyword}}">
                @error('meta_keyword')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Meta Discriptione</label>
                <input type="text" class="form-control" name="meta_discription" id="exampleInputPassword1" placeholder="Instagram" value="{{$scos->meta_discription}}">
                @error('meta_discription')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Google analytics</label>
                <input type="text" class="form-control" name="google_analytics" id="exampleInputPassword1" placeholder="Linkedin" value="{{$scos->google_analytics}}">
                @error('google_analytics')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Google varefication</label>
                <input type="text" class="form-control" name="google_verification" id="exampleInputPassword1" placeholder="Linkedin" value="{{$scos->google_verification}}">
                @error('google_verification')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Google alexa</label>
                <input type="text" class="form-control" name="alexa_analytics" id="exampleInputPassword1" placeholder="Linkedin" value="{{$scos->alexa_analytics}}">
                @error('alexa_analytics')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Sco Setting Update</button>
        </form>
    </div>
</div>
@endsection
