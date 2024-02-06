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
        <h4 class="modal-title">Edit Advertiscment</h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{route('horizontalverticalads.update',$editAds->id)}}" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Link</label>
                <input type="text" class="form-control" name="link" id="exampleInputEmail1" placeholder="Title English" value="{{$editAds->link}}">
                @error('title_english')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputFile">Ads Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="ads">
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
                    <img src="{{asset('ads_image/')}}/{{$editAds->ads}}" style="height: 80px; width:80px">
                    <input type="hidden" name="oldads" value="{{$editAds->ads}}">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">type</label>
                <select class="form-control" name="type"  required>
                    <option selected="" disabled="">==Choose one==</option>
                    <option  value="{{$editAds->id}}" <?php if($editAds->type==2){
                        echo"selected";
                    }?>>Horizontal</option>
                    <option value="{{$editAds->id}}" <?php if($editAds->type==1){
                        echo"selected";
                    }?>>Vertical</option>
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


