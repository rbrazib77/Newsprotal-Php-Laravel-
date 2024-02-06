@extends('layouts.masterdashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">WebSite Setting<span class="badge btn-info "></span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="{{route('update.websitesetting',$WebsiteSetting->id)}}" role="form" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Address Bangla</label>
                    <textarea class="textarea" name="address_bangla" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$WebsiteSetting->address_bangla}} </textarea>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Address English</label>
                    <textarea class="textarea" name="address_english" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$WebsiteSetting->address_english}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone Bangla</label>
                    <input type="text" class="form-control" name="phone_bangla" id="exampleInputEmail1" placeholder="Phone Bangla" value="{{$WebsiteSetting->phone_bangla}}">
                    @error('title_bangla')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone English</label>
                    <input type="text" class="form-control" name="phone_english" id="exampleInputEmail1" placeholder="Phone English" value="{{$WebsiteSetting->phone_english}}">
                    @error('title_bangla')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" placeholder="Title Bangla" value="{{$WebsiteSetting->email}}">
                    @error('title_bangla')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Logo</label>
                            <input type="file" class="form-control" id="image" name="image" id="exampleInputEmail1">
                            <input type="hidden" name="oldimage" value="{{$WebsiteSetting->image}}">
                            @error('image')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img width="100" id="showImage" height="100" src="{{(!empty($WebsiteSetting->image)) ? url('websitesetting/'.$WebsiteSetting->image):url('upload/no_image.jpg')}}" alt="User Avatar" style="border: 2px solid #dddddd">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

  <script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    })
</script>
@endsection


