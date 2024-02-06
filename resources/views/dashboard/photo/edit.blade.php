@extends('layouts.masterdashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">photos</li>
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
        <h4 class="modal-title">photo Update </h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('update.photo',$photo->id)}}" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title Bangla</label>
                <input type="text" class="form-control" name="title_bangla" id="exampleInputEmail1" placeholder="Title Bangla" value="{{$photo->title_bangla}}">
                @error('district_bangla')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Title English</label>
                <input type="text" class="form-control" name="title_english" id="exampleInputEmail1" placeholder="Title English" value="{{$photo->title_english}}">
                @error('title_english')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputFile">photo</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="photo">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-lg-6">
                    old image
                    <img src="{{asset('photos_gallery/')}}/{{$photo->photo}}" style="height: 80px; width:80px">
                    <input type="hidden" name="oldphoto" value="{{$photo->photo}}">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">type</label>
                <select class="form-control" name="type"  required>
                    <option selected="" disabled="">==Choose one==</option>
                    <option  value="1" <?php if($photo->type==1){
                        echo"selected";
                    }?>>Big Photo</option>
                    <option value="0" <?php if($photo->type==0){
                        echo"selected";
                    }?>>Small Photo</option>
                </select>
                @error('type')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">photo Update</button>
        </form>
    </div>
</div>
@endsection


