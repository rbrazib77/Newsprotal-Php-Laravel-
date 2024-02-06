@extends('layouts.frontendmaster')
@section('content')
<section class="single-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                   <li><a href="#"><i class="fa fa-home"></i></a></li>
                    <li>
                        <a href="#">
                        @if (session()->get('lang')=='english')
                        All News
                        @else
                        সব খবর
                        @endif
                        </a>
                    </li>
                </ol>
            </div>
        </div>
      <!-- ******** -->
      <div class="row">
        <div class="col-md-8 col-sm-8">
            <!-- ********* -->
            <div class="row">
                @foreach ($posts as $row)
                @php
                $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                @endphp
                <div class="col-md-4 col-sm-4">
                    <div class="top-news sng-border-btm">
                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"> <img src="{{asset('postimages')}}/{{$row->image}}" alt="Notebook"></a>
                        <h4 class="heading-02">
                            <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                @if (session()->get('lang')=='english')
                                {{$row->title_english}}
                                @else
                                {{$row->title_bangla}}
                                @endif
                            </a>
                        </h4>
                    </div>
                </div>
                @endforeach
            </div>
            {{$posts->links()}}
        </div>
        <div class="col-md-4 col-sm-4">
            <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        @php
                        $vertical1=DB::table('ads')->where('type',1)->skip(1)->first();
                        // $vertical=DB::table('ads')->where('type',1)->first();
                        @endphp
                        @if ($vertical1==NULL)
                        @else
                        <div class="sidebar-add">
                            <img src="{{asset('ads_image')}}/{{$vertical1->ads}}" alt="" />
                        </div>
                        @endif
                    </div>
                </div><!-- /.add-close -->
                <div class="tab-header">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
                            @if (session()->get('lang')=='english')
                            Lates News
                            @else
                            সর্বশেষ
                            @endif
                        </a></li>
                        <li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">

                            @if (session()->get('lang')=='english')
                            Favourite News
                            @else
                            জনপ্রিয়
                            @endif
                        </a></li>
                        <li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
                            @if (session()->get('lang')=='english')
                            Highest Read
                            @else
                            পঠিত
                            @endif
                        </a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content ">
                        @php
                            $lates=DB::table('posts')->orderBy('id','DESC')->limit(8)->get();
                            $favourite=DB::table('posts')->inRandomOrder()->orderBy('id','DESC')->limit(8)->get();
                            $highest=DB::table('posts')->inRandomOrder()->orderBy('id','ASC')->limit(8)->get();
                        @endphp
                        <div role="tabpanel" class="tab-pane in active" id="tab21">
                            <div class="news-titletab">
                                @foreach ($lates as $row)
                                @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                @endphp
                                <div class="news-title-02" style="display:flex; align-items: center">
                                    <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                    <img src="{{asset('postimages')}}/{{$row->image}}" alt="nto" width="100" height="100" style="margin-right: 20px;">
                                    </a>
                                    <h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                        @if (session()->get('lang')=='english')
                                        {{$row->title_english}}
                                        @else
                                        {{$row->title_bangla}}
                                        @endif
                                    </a>
                                    </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab22">
                            <div class="news-titletab">
                                @foreach ($favourite as $row)
                                @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                @endphp
                                <div class="news-title-02" style="display:flex; align-items: center">
                                    <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                        <img src="{{asset('postimages')}}/{{$row->image}}" alt="nto" width="100" height="100" style="margin-right: 20px;">
                                    </a>
                                    <h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                        @if (session()->get('lang')=='english')
                                        {{$row->title_english}}
                                        @else
                                        {{$row->title_bangla}}
                                        @endif
                                    </a>
                                    </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab23">
                            <div class="news-titletab">
                                @foreach ($highest as $row)
                                @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                @endphp
                                <div class="news-title-02" style="display:flex; align-items: center">
                                    <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                        <img src="{{asset('postimages')}}/{{$row->image}}" alt="nto" width="100" height="100" style="margin-right: 20px;">
                                    </a>
                                    <h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                        @if (session()->get('lang')=='english')
                                        {{$row->title_english}}
                                        @else
                                        {{$row->title_bangla}}
                                        @endif
                                    </a>
                                    </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        @php
                        $vertical1=DB::table('ads')->where('type',1)->first();
                        // $vertical=DB::table('ads')->where('type',1)->first();
                        @endphp
                        @if ($vertical1==NULL)
                        @else
                        <div class="sidebar-add">
                            <img src="{{asset('ads_image')}}/{{$vertical1->ads}}" alt="" />
                        </div>
                        @endif
                    </div>
                </div><!-- /.add-close -->
        </div>
      </div>
    </div>
</section>
@endsection

