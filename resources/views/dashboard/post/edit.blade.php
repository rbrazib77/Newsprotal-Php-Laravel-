@extends('layouts.masterdashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@php
    $sub=DB::table('subcategories')->where('category_id',$posts->category_id)->get();
    $subdistricts=DB::table('subdistricts')->where('district_id',$posts->district_id)->get();
    // $sub=DB::table('subdistricts')
@endphp
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb ">
              <li class="breadcrumb-item active">Post Plane Edit</li>
              <li class="breadcrumb-item"><a href="#">Post Edit Plane</a></li>
            </ol>
        </div><!-- /.col -->
        <div class="col-sm-6 text-right">
            {{-- <button class="btn btn-success" style="float: right">Add</button> --}}
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Post Edit Plane</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('post.update',$posts->id)}}" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Title Bangla</label>
                        <input type="text" class="form-control" name="title_bangla" id="exampleInputEmail1" placeholder="Title Bangla" value="{{$posts->title_bangla}}">
                    </div>
                     <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Title English</label>
                        <input type="text" class="form-control" name="title_english" id="exampleInputEmail1" placeholder="Title English" value="{{$posts->title_english}}">
                    </div>
                </div>
                 <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Category</label>
                        <select name="category_id" class="form-control">
                            <option selected="" disabled="">==Choose one==</option>
                            @foreach ($category as $row )
                            <option value="{{$row->id}}" <?php if($row->id==$posts->category_id){
                                echo"selected";
                            }?>>{{$row->category_bangla}}</option>
                            @endforeach
                        </select>
                        @error('district_id')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                     <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Sub Category</label>
                        <select name="subcategory_id" class="form-control" id="subcategory_id">
                            <option selected="" disabled="">==Choose one==</option>
                            @foreach ($sub as $row )
                            <option value="{{$row->id}}" <?php if($row->id==$posts->subcategory_id){
                                echo"selected";
                            }?>>{{$row->subcategory_bangla}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">District</label>
                        <select name="district_id" class="form-control">
                            <option selected="" disabled="">==Choose one==</option>
                            @foreach ($district as $row )
                            <option value="{{$row->id}}" <?php if($row->id==$posts->district_id){
                                echo"selected";
                            }?> >{{$row->district_bangla}}</option>
                            @endforeach
                        </select>
                        @error('district_id')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                     <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Sub District</label>
                        <select name="subdistrict_id" class="form-control" id="subdistrict_id">
                            <option selected="" disabled="">==Choose one==</option>
                            @foreach ($subdistricts as $row )
                            <option value="{{$row->id}}" <?php if($row->id==$posts->subdistrict_id){
                                echo"selected";
                            }?> >{{$row->subdistrict_bangla}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Tags Bangla</label>
                        <input type="text" class="form-control" name="tags_bangla" id="exampleInputEmail1" placeholder="Tags Bangla" value="{{$posts->tags_bangla}}" >
                    </div>
                     <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Tags English</label>
                        <input type="text" class="form-control" name="tags_english" id="exampleInputEmail1" placeholder="Tags English" value="{{$posts->tags_english}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                              </div>
                            </div>
                            <strong>
                                @error('image')
                                <span>{{$message}}</span>
                                @enderror
                            </strong>
                            <strong>
                              {{session('error')}}
                            </strong>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        old image
                        <img src="{{asset('postimages/')}}/{{$posts->image}}" style="height: 80px; width:80px">
                        <input type="hidden" name="oldimage" value="{{$posts->image}}">
                    </div>
                </div>
                  <div class="form-group col-lg-12">
                    <label for="exampleInputEmail1">Details Bangla</label>
                    <textarea class="textarea" name="details_bangla" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    {{$posts->details_bangla}}
                    </textarea>
                </div>
                <div class="form-group col-lg-12">
                    <label for="exampleInputEmail1">Details English</label>
                    <textarea class="textarea" name="details_english" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    {{$posts->details_english}}
                    </textarea>
                </div>
                <div class="row">
                    <div class="form-check col-lg-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="headline" value="1" <?php if($posts->headline==1){
                            echo"checked";
                        }?>>
                        <label class="form-check-label" for="exampleCheck1">Headline</label>
                    </div>
                    <div class="form-check col-lg-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="bigthumbnail" value="1" <?php if($posts->bigthumbnail==1){
                            echo"checked";
                        }?>>
                        <label class="form-check-label" for="exampleCheck1">Genarel Big Thumbnail</label>
                    </div>
                        <div class="form-check col-lg-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section" value="1" <?php if($posts->first_section==1){
                            echo"checked";
                        }?>>
                        <label class="form-check-label" for="exampleCheck1">First Section</label>
                    </div>
                        <div class="form-check col-lg-6">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section_thumbnail" value="1" <?php if($posts->first_section_thumbnail==1){
                            echo"checked";
                        }?>>
                        <label class="form-check-label" for="exampleCheck1">First Section Big thumbnail</label>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>
</section>

<!-- /.card -->
<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url:"{{url('/get/subcatagory/')}}/" +category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        console.log(data);
                        $("#subcategory_id").empty();
                        $.each(data,function(key,value){
                            $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_bangla+'</option>');
                        });
                    }
                });

            }else{
                alert('danger');
            }
        });
    });
</script>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        $('select[name="district_id"]').on('change',function(){
            var district_id = $(this).val();
            if(district_id){
                $.ajax({
                    url:"{{url('/get/subdistrict/')}}/" +district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        console.log(data);
                        $("#subdistrict_id").empty();
                        $.each(data,function(key,value){
                            $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_bangla+'</option>');
                        });
                    }
                });

            }else{
                alert('danger');
            }
        });
    });
</script>

@endsection
