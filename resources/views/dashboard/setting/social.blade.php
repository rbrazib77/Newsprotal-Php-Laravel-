@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Socials Setting</li>
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
        <h4 class="modal-title">Socials Settinged </h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('social.update',$socials->id)}}" role="form">

            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Facebook</label>
                <input type="text" class="form-control" name="facebook" id="exampleInputEmail1" placeholder="Facebook" value="{{$socials->facebook}}">
                @error('facebook')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Twitter</label>
                <input type="text" class="form-control" name="twitter" id="exampleInputPassword1" placeholder="Twitter" value="{{$socials->twitter}}">
                @error('twitter')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Youtube</label>
                <input type="text" class="form-control" name="youtube" id="exampleInputPassword1" placeholder="Youtube" value="{{$socials->youtube}}">
                @error('youtube')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">instagram</label>
                <input type="text" class="form-control" name="instagram" id="exampleInputPassword1" placeholder="Instagram" value="{{$socials->instagram}}">
                @error('instagram')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">linkedin</label>
                <input type="text" class="form-control" name="linkedin" id="exampleInputPassword1" placeholder="Linkedin" value="{{$socials->linkedin}}">
                @error('linkedin')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Social Settinged Update</button>
        </form>
    </div>
</div>
@endsection
