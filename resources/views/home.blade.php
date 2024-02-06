@extends('layouts.masterdashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            @php
                $AllCategory=DB::table('categories')->get();
                $AllSubCategory=DB::table('subcategories')->get();
                $AllPosts=DB::table('posts')->get();
                $Allads=DB::table('ads')->get();
                $Alldistrict=DB::table('districts')->get();
                $Allsubdistrict=DB::table('subdistricts')->get();
                $Allpost=DB::table('posts')->get();
                $Allwriter=DB::table('users')->where('type',0)->get();
                $Allphoto=DB::table('photos')->get();
                $Allvideo=DB::table('videos')->get();
                $Allwebstie=DB::table('websties')->get();
            @endphp
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <a href="{{route('category.index')}}" class="small-box-footer">
              <div class="small-box bg-info">
                <div class="inner" style="text-align: center">
                  <h3>{{count($AllCategory)}}</h3>
                  <p>Category</p>
                </div>
              </div>
            </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <a href="{{route('subcategory.index')}}">
              <div class="small-box bg-success">
                <div class="inner" style="text-align: center">
                  <h3>{{count($AllSubCategory)}}</h3>
                  <p>Sub Category</p>
                </div>
              </div>
            </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <a href="{{route('all.post')}}">
              <div class="small-box bg-warning">
                <div class="inner" style="text-align: center">
                  <h3>{{count($AllPosts)}}</h3>
                  <p>Post</p>
                </div>
              </div>
            </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <a href="{{route('horizontalvertical.ads')}}">
              <div class="small-box bg-danger">
                <div class="inner" style="text-align: center">
                  <h3>{{count($Allads)}}</h3>
                  <p>Advertisement</p>
                </div>
              </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <a href="{{route('district.index')}}">
                <div class="small-box bg-info">
                  <div class="inner" style="text-align: center">
                    <h3>{{count($Alldistrict)}}</h3>
                    <p>District</p>
                  </div>
                </div>
                </a>
            </div>
             <!-- ./col -->
             <div class="col-lg-2 col-6">
                <!-- small box -->
                <a href="{{route('subdistrict.index')}}">
                <div class="small-box bg-success">
                  <div class="inner" style="text-align: center">
                    <h3>{{count($Allsubdistrict)}}</h3>
                    <p>Sub District</p>
                  </div>
                </div>
                </a>
            </div>


        </div><!-- .row End -->
        <div class="row">

            <div class="col-lg-2 col-6">
              <!-- small box -->
              <a href="{{route('index.writer')}}">
              <div class="small-box bg-warning">
                <div class="inner" style="text-align: center">
                  <h3>{{count($Allwriter)}}</h3>
                  <p>Writer</p>
                </div>
              </div>
            </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <a href="{{route('insert.photo')}}">
                <div class="small-box bg-danger">
                  <div class="inner" style="text-align: center">
                    <h3>{{count($Allphoto)}}</h3>
                    <p>Photo</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <a href="{{route('insert.video')}}">
                <div class="small-box bg-info">
                  <div class="inner" style="text-align: center">
                    <h3>{{count($Allvideo)}}</h3>
                    <p>Video</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <a href="{{route('insert.improtantwebsite')}}">
                <div class="small-box bg-success">
                  <div class="inner" style="text-align: center">
                    <h3>{{count($Allwebstie)}}</h3>
                    <p>Improtant Website</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- ./col -->
        </div><!-- .row End -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
