@extends('layouts.frontendmaster')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @php
        $firstsectionbig=DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id',"DESC")->first();
        $firstsectionsmall =DB::table('posts')->where('first_section',1)->orderBy('id',"DESC")->limit(12)->get();
    @endphp
   	<!-- 1st-news-section-start -->
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<div class="row">
						<div class="col-md-1 col-sm-1 col-lg-1"></div>
						<div class="col-md-10 col-sm-10">
                            @php
                            $slug=preg_replace('/\s+/u','-',trim($firstsectionbig->title_bangla));
                            @endphp
							<div class="lead-news">
								<div class="service-img"><a href="{{URL::to('view-post/'.$firstsectionbig->id.'/'.$slug)}}"><img src="{{asset('postimages')}}/{{$firstsectionbig->image}}" alt="Notebook"></a></div>
								<div class="content">
								<h4 class="lead-heading-01"><a href="{{URL::to('view-post/'.$firstsectionbig->id.'/'.$slug)}}">
                                    @if (session()->get('lang')=='english')
                                    {{$firstsectionbig->title_english}}
                                    @else
                                    {{$firstsectionbig->title_bangla}}
                                    @endif
                                </a>
                                 </h4>
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
                        @foreach ($firstsectionsmall as $row)
                        @php
                        $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                        @endphp
                            <div class="col-md-3 col-sm-3">
                                <div class="top-news">
                                    <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{asset('postimages')}}/{{$row->image}}" alt="Notebook"></a>
                                    <h4 class="heading-02">
                                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                            @if (session()->get('lang')=='english')
                                            {{Str::limit($row->title_english, 20,)}}
                                            @else
                                            {{Str::limit($row->title_bangla, 20,)}}
                                            @endif

                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
					<!-- news-start -->
					<div class="row">
						<div class="col-md-6 col-sm-6">
                            @php
                                $firstcategory=DB::table('categories')->first();
                                $firstcategorypost=DB::table('posts')->where('category_id',$firstcategory->id)->where('bigthumbnail',1)->first();
                                $firstcategorypostsmall=DB::table('posts')->where('category_id',$firstcategory->id)->where('bigthumbnail',NULL)->get();
                            @endphp
							<div class="bg-one">
								<div class="cetagory-title">
                                    @if (session()->get('lang')=='english')
                                        {{$firstcategory->category_english}}
                                        @else
                                        {{$firstcategory->category_bangla}}
                                    @endif
                                    <a href="{{URL::to('post/'.$firstcategory->id.'/'.$firstcategory->category_bangla)}}">
                                        <span>
                                            @if (session()->get('lang')=='english')
                                            More
                                            @else
                                            আরও
                                            @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
								<div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($firstcategorypost->title_bangla));
                                        @endphp
										<div class="top-news" style="width: 250px">
											<a href="{{URL::to('view-post/'.$firstcategorypost->id.'/'.$slug)}}"><img width="100%" src="{{asset('postimages')}}/{{$firstcategorypost->image}}" alt="Notebook"></a>
											<h4 class="heading-02">
                                                <a href="{{URL::to('view-post/'.$firstcategorypost->id.'/'.$slug)}}">
                                                    @if (session()->get('lang')=='english')
                                                    {{$firstcategorypost->title_english}}
                                                    @else
                                                    {{$firstcategorypost->title_bangla}}
                                                    @endif
                                                </a>
                                            </h4>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
                                        @foreach ($firstcategorypostsmall as $row)
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                        @endphp
										<div class="image-title">
											<a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{asset('postimages')}}/{{$row->image}}" alt="Notebook"></a>
											<h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$row->title_english}}
                                                @else
                                                {{$row->title_bangla}}
                                                @endif
                                            </a> </h4>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
                            @php
                            $secondcategory=DB::table('categories')->skip(1)->first();
                            $secondcategorypost=DB::table('posts')->where('category_id',$secondcategory->id)->where('bigthumbnail',1)->first();
                            $secondcategorypostsmall=DB::table('posts')->where('category_id',$secondcategory->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get();
                            @endphp
							<div class="bg-one">
								<div class="cetagory-title">
                                    @if (session()->get('lang')=='english')
                                    {{$secondcategory->category_english}}
                                    @else
                                    {{$secondcategory->category_bangla}}
                                    @endif
                                    <a href="{{URL::to('post/'.$secondcategory->id.'/'.$secondcategory->category_bangla)}}">
                                    <span>
                                        @if (session()->get('lang')=='english')
                                        More
                                        @else
                                        আরও
                                        @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </span>
                                    </a>
                                </div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($secondcategorypost->title_bangla));
                                        @endphp
										<div class="top-news" style="width: 250px">
											<a href="{{URL::to('view-post/'.$secondcategorypost->id.'/'.$slug)}}"><img width="100%" src="{{asset('postimages')}}/{{$secondcategorypost->image}}" alt="Notebook"></a>
											<h4 class="heading-02">
                                                <a href="{{URL::to('view-post/'.$secondcategorypost->id.'/'.$slug)}}">
                                                    @if (session()->get('lang')=='english')
                                                    {{$secondcategorypost->title_english}}
                                                    @else
                                                    {{$secondcategorypost->title_bangla}}
                                                    @endif
                                                </a>
                                            </h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
                                        @foreach ($secondcategorypostsmall as $row)
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                        @endphp
										<div class="image-title">
											<a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"><img src="{{asset('postimages')}}/{{$row->image}}" alt="Notebook"></a>
											<h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$row->title_english}}
                                                @else
                                                {{$row->title_bangla}}
                                                @endif
                                            </a> </h4>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            @php
                            $thirdcategory=DB::table('categories')->skip(2)->first();
                            $thirdcategorypost=DB::table('posts')->where('category_id', $thirdcategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
                            $thirdcategorypostsmall=DB::table('posts')->where('category_id', $thirdcategory->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->get();
                            @endphp
                            <div class="bg-one">
                                <div class="cetagory-title">
                                        @if (session()->get('lang')=='english')
                                        {{$thirdcategory->category_english}}
                                        @else
                                        {{$thirdcategory->category_bangla}}
                                        @endif
                                        <a href="{{URL::to('post/'.$thirdcategory->id.'/'.$thirdcategory->category_bangla)}}">
                                            <span>
                                                @if (session()->get('lang')=='english')
                                                More
                                                @else
                                                আরও
                                                @endif
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($thirdcategorypost->title_bangla));
                                        @endphp
                                        <div class="top-news" style="width: 250px">
                                            <a href="{{URL::to('view-post/'.$thirdcategorypost->id.'/'.$slug)}}">
                                                <img width="100%" src="{{asset('postimages')}}/{{$thirdcategorypost->image}}" alt="Notebook">
                                            </a>
                                            <h4 class="heading-02"><a href="{{URL::to('view-post/'.$thirdcategorypost->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$thirdcategorypost->title_english}}
                                                @else
                                                {{$thirdcategorypost->title_bangla}}
                                                @endif
                                            </a> </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($thirdcategorypostsmall as $row )
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                        @endphp
                                        <div class="image-title">
                                            <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                <img src="{{asset('postimages')}}/{{$row->image}}" alt="Notebook">
                                            </a>
                                            <h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$row->title_english}}
                                                @else
                                                {{$row->title_bangla}}
                                                @endif
                                                </a> </h4>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @php
                            $fourthcategory=DB::table('categories')->skip(3)->first();
                            $fourthcategorypost=DB::table('posts')->where('category_id', $fourthcategory->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first();
                            $fourthcategorypostsmall=DB::table('posts')->where('category_id', $fourthcategory->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get();
                            @endphp
                            <div class="bg-one">
                                <div class="cetagory-title">
                                        @if (session()->get('lang')=='english')
                                        {{$fourthcategory->category_english}}
                                        @else
                                        {{$fourthcategory->category_bangla}}
                                        @endif
                                        <a href="{{URL::to('post/'.$fourthcategory->id.'/'.$fourthcategory->category_bangla)}}">
                                         <span>
                                            @if (session()->get('lang')=='english')
                                            More
                                            @else
                                            আরও
                                            @endif
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            </span>
                                         {{-- <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span> --}}
                                        </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($fourthcategorypost->title_bangla));
                                        @endphp
                                        <div class="top-news">
                                            <a href="{{URL::to('view-post/'.$fourthcategorypost->id.'/'.$slug)}}">
                                                <img src="{{asset('postimages')}}/{{$fourthcategorypost->image}}" alt="Notebook">
                                            </a>
                                            <h4 class="heading-02"><a href="{{URL::to('view-post/'.$fourthcategorypost->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$fourthcategorypost->title_english}}
                                                @else
                                                {{$fourthcategorypost->title_bangla}}
                                                @endif
                                            </a> </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($fourthcategorypostsmall as $row )
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                        @endphp
                                        <div class="image-title">
                                            <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                <img src="{{asset('postimages')}}/{{$row->image}}" alt="Notebook">
                                            </a>
                                            <h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$row->title_english}}
                                                @else
                                                {{$row->title_bangla}}
                                                @endif
                                                </a> </h4>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            @php
                            $fifthcategory=DB::table('categories')->skip(4)->first();
                            $fifthcategorypost=DB::table('posts')->where('category_id', $fifthcategory->id)->where('bigthumbnail',1)->first();
                            $fifthcategorypostsmall=DB::table('posts')->where('category_id', $fifthcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
                            @endphp
                            <div class="bg-one">
                                <div class="cetagory-title">
                                        @if (session()->get('lang')=='english')
                                        {{$fifthcategory->category_english}}
                                        @else
                                        {{$fifthcategory->category_bangla}}
                                        @endif
                                        <a href="{{URL::to('post/'.$fifthcategory->id.'/'.$fifthcategory->category_bangla)}}">
                                         <span>
                                            @if (session()->get('lang')=='english')
                                            More
                                            @else
                                            আরও
                                            @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($fifthcategorypost->title_bangla));
                                        @endphp
                                        @if ($fifthcategorypost)
                                        <div class="top-news">
                                            <a href="{{URL::to('view-post/'.$fifthcategorypost->id.'/'.$slug)}}">
                                                <img src="{{asset('postimages')}}/{{$fifthcategorypost->image}}" alt="Notebook">
                                            </a>
                                            <h4 class="heading-02"><a href="{{URL::to('view-post/'.$fifthcategorypost->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$fifthcategorypost->title_english}}
                                                @else
                                                {{$fifthcategorypost->title_bangla}}
                                                @endif
                                            </a> </h4>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($fifthcategorypostsmall as $row )
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                        @endphp
                                        <div class="image-title">
                                            <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                <img src="{{asset('postimages')}}/{{$row->image}}" alt="Notebook">
                                            </a>
                                            <h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$row->title_english}}
                                                @else
                                                {{$row->title_bangla}}
                                                @endif
                                                </a> </h4>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            @php
                            $sixthcategory=DB::table('categories')->skip(5)->first();
                            $sixthcategorypost=DB::table('posts')->where('category_id', $sixthcategory->id)->where('bigthumbnail',1)->orderBy('id',"DESC")->first();
                            $sixthcategorypostsmall=DB::table('posts')->where('category_id', $sixthcategory->id)->where('bigthumbnail',NULL)->orderBy('id',"DESC")->limit(3)->get();
                            @endphp
                            <div class="bg-one">
                                <div class="cetagory-title">
                                        @if (session()->get('lang')=='english')
                                        {{$sixthcategory->category_english}}
                                        @else
                                        {{$sixthcategory->category_bangla}}
                                        @endif
                                        <a href="{{URL::to('post/'.$sixthcategory->id.'/'.$sixthcategory->category_bangla)}}">
                                         <span>
                                            @if (session()->get('lang')=='english')
                                            More
                                            @else
                                            আরও
                                            @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($sixthcategorypost->title_bangla));
                                        @endphp
                                        @if ($sixthcategorypost)
                                        <div class="top-news">
                                            <a href="{{URL::to('view-post/'.$sixthcategorypost->id.'/'.$slug)}}">
                                                <img src="{{asset('postimages')}}/{{$sixthcategorypost->image}}" alt="Notebook">
                                            </a>
                                            <h4 class="heading-02"><a href="{{URL::to('view-post/'.$sixthcategorypost->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$sixthcategorypost->title_english}}
                                                @else
                                                {{$sixthcategorypost->title_bangla}}
                                                @endif
                                            </a> </h4>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($sixthcategorypostsmall as $row )
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                        @endphp
                                        <div class="image-title">
                                            <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                <img src="{{asset('postimages')}}/{{$row->image}}" alt="Notebook">
                                            </a>
                                            <h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$row->title_english}}
                                                @else
                                                {{$row->title_bangla}}
                                                @endif
                                                </a> </h4>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            @php
                            $seventhcategory=DB::table('categories')->skip(6)->first();
                            $seventhcategorypost=DB::table('posts')->where('category_id', $seventhcategory->id)->where('bigthumbnail',1)->first();
                            $seventhcategorypostsmall=DB::table('posts')->where('category_id', $seventhcategory->id)->where('bigthumbnail',NULL)->get();
                            @endphp
                            <div class="bg-one">
                                <div class="cetagory-title">
                                        @if (session()->get('lang')=='english')
                                        {{$seventhcategory->category_english}}
                                        @else
                                        {{$seventhcategory->category_bangla}}
                                        @endif
                                        <a href="{{URL::to('post/'.$seventhcategory->id.'/'.$seventhcategory->category_bangla)}}">
                                         <span>
                                            @if (session()->get('lang')=='english')
                                            More
                                            @else
                                            আরও
                                            @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($seventhcategorypost->title_bangla));
                                        @endphp
                                        @if ($seventhcategorypost)
                                        <div class="top-news">
                                            <a href="{{URL::to('view-post/'.$seventhcategorypost->id.'/'.$slug)}}">
                                                <img src="{{asset('postimages')}}/{{$seventhcategorypost->image}}" alt="Notebook">
                                            </a>
                                            <h4 class="heading-02"><a href="{{URL::to('view-post/'.$seventhcategorypost->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$seventhcategorypost->title_english}}
                                                @else
                                                {{$seventhcategorypost->title_bangla}}
                                                @endif
                                            </a> </h4>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($seventhcategorypostsmall as $row )
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                        @endphp
                                        <div class="image-title">
                                            <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                <img src="{{asset('postimages')}}/{{$row->image}}" alt="Notebook">
                                            </a>
                                            <h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$row->title_english}}
                                                @else
                                                {{$row->title_bangla}}
                                                @endif
                                                </a> </h4>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            @php
                            $eighthcategory=DB::table('categories')->skip(7)->first();
                            $eighthcategorypost=DB::table('posts')->where('category_id', $eighthcategory->id)->where('bigthumbnail',1)->orderBy('id',"DESC")->first();
                            $eighthcategorypostsmall=DB::table('posts')->where('category_id', $eighthcategory->id)->where('bigthumbnail',NULL)->orderBy('id',"DESC")->limit(3)->get();
                            @endphp
                            <div class="bg-one">
                                <div class="cetagory-title">
                                        @if (session()->get('lang')=='english')
                                        {{$eighthcategory->category_english}}
                                        @else
                                        {{$eighthcategory->category_bangla}}
                                        @endif
                                        <a href="{{URL::to('post/'.$eighthcategory->id.'/'.$eighthcategory->category_bangla)}}">
                                         <span>
                                            @if (session()->get('lang')=='english')
                                            More
                                            @else
                                            আরও
                                            @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="row">
                                    @php
                                    $slug=preg_replace('/\s+/u','-',trim($eighthcategorypost->title_bangla));
                                    @endphp
                                    <div class="col-md-6 col-sm-6">
                                        @if ($eighthcategorypost)
                                        <div class="top-news">
                                            <a href="{{URL::to('view-post/'.$eighthcategorypost->id.'/'.$slug)}}">
                                                <img src="{{asset('postimages')}}/{{$eighthcategorypost->image}}" alt="Notebook">
                                            </a>
                                            <h4 class="heading-02"><a href="{{URL::to('view-post/'.$eighthcategorypost->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$eighthcategorypost->title_english}}
                                                @else
                                                {{$eighthcategorypost->title_bangla}}
                                                @endif
                                            </a> </h4>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($eighthcategorypostsmall as $row )
                                        @php
                                        $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                        @endphp
                                        <div class="image-title">
                                            <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                <img src="{{asset('postimages')}}/{{$row->image}}" alt="Notebook">
                                            </a>
                                            <h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                @if (session()->get('lang')=='english')
                                                {{$row->title_english}}
                                                @else
                                                {{$row->title_bangla}}
                                                @endif
                                                </a> </h4>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            @php
                            $countrybigpost=DB::table('posts')->whereNotNull('district_id')->orderBy('id','DESC')->first();
                            $countryfirst3=DB::table('posts')->whereNotNull('district_id')->skip(1)->orderBy('id','DESC')->limit(3)->get();
                            $countrysecond3=DB::table('posts')->whereNotNull('district_id')->skip(4)->orderBy('id','DESC')->limit(3)->get();
                            @endphp
                            <div class="cetagory-title">
                                @if (session()->get('lang')=='english')
                                Country
                                @else
                                সারাদেশে
                                @endif
                                <a href="{{URL::to('saradeshall')}}">
                                 <span>
                                    @if (session()->get('lang')=='english')
                                    More
                                    @else
                                    আরও
                                    @endif
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="row" style="margin-top: 30px; margin-bottom: 30px">
                                @php
                                    $district=DB::table('districts')->get();
                                @endphp
                               <div class="row">
                                <form action="{{route('saradesh.news')}}" method="GET">
                                    @csrf
                                    <div class="col-lg-4">
                                        <select  name="district_id" id="district_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Distrct</option>
                                            @foreach ($district as $row)
                                            <option value="{{$row->id}}">{{$row->district_bangla}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select  name="subdistrict_id" id="subdistrict_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Thana</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <button class="btn btn-success btn-block" type="submit">
                                            @if (session()->get('lang')=='english')
                                            Submit
                                            @else
                                            খুজুন
                                            @endif
                                        </button>
                                    </div>
                                </form>
                               </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    @php
                                    $slug=preg_replace('/\s+/u','-',trim($countrybigpost->title_bangla));
                                    @endphp
                                    <div class="top-news">
                                        <a href="{{URL::to('view-post/'.$countrybigpost->id.'/'.$slug)}}">
                                            <img src="{{asset('postimages')}}/{{$countrybigpost->image}}" alt="Notebook">
                                        </a>
                                        <h4 class="heading-02"><a href="{{URL::to('view-post/'.$countrybigpost->id.'/'.$slug)}}">
                                            @if (session()->get('lang')=='english')
                                            {{$countrybigpost->title_english}}
                                            @else
                                            {{$countrybigpost->title_bangla}}
                                            @endif
                                        </a> </h4>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    @foreach ($countryfirst3 as $row )
                                    @php
                                    $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                    @endphp
                                    <div class="image-title">
                                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"> <img src="{{asset('postimages')}}/{{$row->image}}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                            @if (session()->get('lang')=='english')
                                            {{$row->title_english}}
                                            @else
                                            {{$row->title_bangla}}
                                            @endif
                                            </a> </h4>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    @foreach ($countrysecond3 as $row)
                                    @php
                                    $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                    @endphp
                                    <div class="image-title">
                                        <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}"> <img src="{{asset('postimages')}}/{{$row->image}}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                            @if (session()->get('lang')=='english')
                                            {{$row->title_english}}
                                            @else
                                            {{$row->title_bangla}}
                                            @endif
                                            </a> </h4>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- ******* -->
                            <br />

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    @php
                                    $horizontal2=DB::table('ads')->where('type',2)->skip(1)->first();
                                    // $vertical=DB::table('ads')->where('type',1)->first();
                                    @endphp
                                    @if ($horizontal2==NULL)
                                    @else
                                    <div class="sidebar-add">
                                        <img src="{{asset('ads_image')}}/{{$horizontal2->ads}}" alt="" />
                                    </div>
                                    @endif
                                </div>
                            </div><!-- /.add-close -->
                        </div>

                    </div>
				</div>
				<div class="col-md-4 col-sm-4">
					<!-- add-start -->
					<div class="row">
						<div class="col-md-12 col-sm-12 text-center" style="margin-bottom: 30px">
                            <h3 style="color: rgb(166, 164, 160)">Advertisement</h3>
                            @php
                            $vertical1=DB::table('ads')->where('type',1)->first();
                            @endphp
                            <div class="sidebar-add">
                                <img src="{{asset('ads_image')}}/{{$vertical1->ads}}" alt="" />
                            </div>
						</div>
					</div><!-- /.add-close -->
                    <!-- add-start -->
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="tab-header" >
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
                                <div class="tab-content">
                                    @php
                                        $lates=DB::table('posts')->orderBy('id','DESC')->limit(8)->get();
                                        $favourite=DB::table('posts')->inRandomOrder()->orderBy('id','DESC')->limit(8)->get();
                                        $highest=DB::table('posts')->inRandomOrder()->orderBy('id','ASC')->limit(8)->get();
                                    @endphp
                                    <div role="tabpanel" class="tab-pane in active" id="tab21" style="margin-bottom:85px;">
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
                                        <div class="news-titletab" >
                                            @foreach ($favourite as $row)
                                            @php
                                            $slug=preg_replace('/\s+/u','-',trim($row->title_bangla));
                                            @endphp
                                            <div class="news-title-02" style="display:flex; align-items: center">
                                                <a href="{{URL::to('view-post/'.$row->id.'/'.$slug)}}">
                                                <img src="{{asset('postimages')}}/{{$row->image}}" alt="nto"width="100" height="100" style="margin-right: 20px;">
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
                                                    <img src="{{asset('postimages')}}/{{$row->image}}" alt="nto"width="100" height="100" style="margin-right: 20px;">
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
                            <!-- Namaj Times -->
                            <div class="cetagory-title-03">
                                @if (session()->get('lang')=='english')
                                Prayer for times
                                @else
                                নামাজের সময়সূচি
                                @endif
                              </div>
                              <table class="table">
                                <tr>
                                    <th>
                                        @if (session()->get('lang')=='english')
                                        Fajr
                                        @else
                                        ফজর
                                        @endif
                                    </th>
                                    <th>

                                        @if (session()->get('lang')=='english')
                                        {{$namaz->fajr_english}}
                                        @else
                                        {{$namaz->fajr_bangla}}
                                        @endif
                                    </th>
                                </tr>
                                 <tr>
                                    <th>
                                        @if (session()->get('lang')=='english')
                                        johr
                                        @else
                                        যোহর
                                        @endif
                                    </th>
                                    <th>
                                        @if (session()->get('lang')=='english')
                                        {{$namaz->johr_english}}
                                         @else
                                         {{$namaz->johr_bangla}}
                                         @endif
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        @if (session()->get('lang')=='english')
                                        asor
                                        @else
                                        আছর
                                        @endif
                                    </th>
                                    <th>
                                        @if (session()->get('lang')=='english')
                                        {{$namaz->asor_english}}
                                         @else
                                         {{$namaz->asor_bangla}}
                                         @endif
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        @if (session()->get('lang')=='english')
                                        magrib
                                        @else
                                        মাগরিব
                                        @endif
                                    </th>
                                    <th>
                                        @if (session()->get('lang')=='english')
                                        {{$namaz->magrib_english}}
                                         @else
                                         {{$namaz->magrib_bangla}}
                                         @endif
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        @if (session()->get('lang')=='english')
                                        asha
                                        @else
                                        এশার
                                        @endif
                                    </th>
                                    <th>
                                        @if (session()->get('lang')=='english')
                                        {{$namaz->asha_english}}
                                         @else
                                         {{$namaz->asha_bangla}}
                                         @endif
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        @if (session()->get('lang')=='english')
                                        jummah
                                        @else
                                        জুমার
                                        @endif
                                    </th>
                                    <th>
                                        @if (session()->get('lang')=='english')
                                       {{$namaz->jummah_english}}
                                        @else
                                        {{$namaz->jummah_bangla}}
                                        @endif
                                    </th>
                                </tr>
                              </table>


                            <!-- Namaj Times -->
                            <div class="cetagory-title-03">পুরানো সংবাদ  </div>
                            <form action="" method="post">
                                <div class="old-news-date">
                                   <input type="text" name="from" placeholder="From Date" required="">
                                   <input type="text" name="" placeholder="To Date">
                                </div>
                                <div class="old-date-button">
                                    <input type="submit" value="খুজুন ">
                                </div>
                           </form>
                           <!-- news -->
                           <br><br><br><br><br>
                           <div class="cetagory-title-04">
                            @if (session()->get('lang')=='english')
                            Improtant Website
                             @else
                             গুরুত্বপূর্ণ ওয়েবসাইট
                             @endif
                            </div>
                                <div class="">
                                    @foreach ($webstie as $row )
                                        @if ($row->status==1)
                                        <div class="news-title-02">
                                            <h4 class="heading-03"><a href="#"><i class="fa fa-check" aria-hidden="true"></i>
                                                @if (session()->get('lang')=='english')
                                                {{$row->website_name_english}}
                                                @else
                                                {{$row->website_name_bangla}}
                                                @endif
                                            </a>
                                        </h4>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                        </div>
					</div><!-- /.add-close -->

					<!-- youtube-live-start -->
					<div class="cetagory-title-03">লাইভ টিভি </div>
					<div class="photo">
						<div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
							{!! $livetv->embed_code !!}
						</div>
					</div><!-- /.youtube-live-close -->

					<!-- facebook-page-start -->
					<div class="cetagory-title-03">ফেসবুকে আমরা</div>
					<div class="fb-root">
						facebook page here
					</div><!-- /.facebook-page-close -->

					<!-- add-start -->
					<div class="row">
						<div class="col-md-12 col-sm-12 text-center" style="margin-bottom: 30px;">
                            <h3 style="color: rgb(166, 164, 160)">Advertisement</h3>
							<div class="sidebar-add">
                                @php
                                $vertical2=DB::table('ads')->where('type',1)->skip(1)->first();
                                @endphp
                                @if ($vertical2==NULL)
                                @else
                                <div class="sidebar-add">
                                    <img src="{{asset('ads_image')}}/{{$vertical2->ads}}" alt="" />
                                </div>
                                @endif
								{{-- <img src="{{asset('frontend_assets')}}/assets/img/add_01.jpg" alt="" /> --}}
							</div>
						</div>
					</div><!-- /.add-close -->
				</div>
			</div>
		</div>
	</section><!-- /.1st-news-section-close -->

	{{-- <!-- 2nd-news-section-start -->
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
                <div class="col-lg-8">

                <div class="row">

                </div>
                </div>
			</div>
			<!-- ******* -->
			<div class="row">

                <div class="col-md-4 col-sm-3">
					<div class="tab-header" >
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
						<div class="tab-content">
                            @php
                                $lates=DB::table('posts')->orderBy('id','DESC')->limit(8)->get();
                                $favourite=DB::table('posts')->inRandomOrder()->orderBy('id','DESC')->limit(8)->get();
                                $highest=DB::table('posts')->inRandomOrder()->orderBy('id','ASC')->limit(8)->get();
                            @endphp
							<div role="tabpanel" class="tab-pane in active" id="tab21" style="margin-bottom:85px;">
								<div class="news-titletab">
                                    @foreach ($lates as $row)
                                    <div class="news-title-02" style="display:flex; align-items: center">
                                        <img src="{{asset('postimages')}}/{{$row->image}}" alt="nto" width="100" height="100" style="margin-right: 20px;">
										<h4 class="heading-03"><a href="#">
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
                                    @foreach ($highest as $row)
                                    <div class="news-title-02">
                                        <img src="{{asset('postimages')}}/{{$row->image}}" alt="nto" width="50" height="50">
										<h4 class="heading-03"><a href="#">
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
                                    @foreach ($lates as $row)
                                    <div class="news-title-02">
                                        <img src="{{asset('postimages')}}/{{$row->image}}" alt="nto" width="50" height="50">
										<h4 class="heading-03"><a href="#">
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
					<!-- Namaj Times -->
                    <div class="cetagory-title-03">
                        @if (session()->get('lang')=='english')
                        Prayer for times
                        @else
                        নামাজের সময়সূচি
                        @endif
                      </div>
                      <table class="table">
                        <tr>
                            <th>
                                @if (session()->get('lang')=='english')
                                Fajr
                                @else
                                ফজর
                                @endif
                            </th>
                            <th>

                                @if (session()->get('lang')=='english')
                                {{$namaz->fajr_english}}
                                @else
                                {{$namaz->fajr_bangla}}
                                @endif
                            </th>
                        </tr>
                         <tr>
                            <th>
                                @if (session()->get('lang')=='english')
                                johr
                                @else
                                যোহর
                                @endif
                            </th>
                            <th>
                                @if (session()->get('lang')=='english')
                                {{$namaz->johr_english}}
                                 @else
                                 {{$namaz->johr_bangla}}
                                 @endif
                            </th>
                        </tr>
                        <tr>
                            <th>
                                @if (session()->get('lang')=='english')
                                asor
                                @else
                                আছর
                                @endif
                            </th>
                            <th>
                                @if (session()->get('lang')=='english')
                                {{$namaz->asor_english}}
                                 @else
                                 {{$namaz->asor_bangla}}
                                 @endif
                            </th>
                        </tr>
                        <tr>
                            <th>
                                @if (session()->get('lang')=='english')
                                magrib
                                @else
                                মাগরিব
                                @endif
                            </th>
                            <th>
                                @if (session()->get('lang')=='english')
                                {{$namaz->magrib_english}}
                                 @else
                                 {{$namaz->magrib_bangla}}
                                 @endif
                            </th>
                        </tr>
                        <tr>
                            <th>
                                @if (session()->get('lang')=='english')
                                asha
                                @else
                                এশার
                                @endif
                            </th>
                            <th>
                                @if (session()->get('lang')=='english')
                                {{$namaz->asha_english}}
                                 @else
                                 {{$namaz->asha_bangla}}
                                 @endif
                            </th>
                        </tr>
                        <tr>
                            <th>
                                @if (session()->get('lang')=='english')
                                jummah
                                @else
                                জুমার
                                @endif
                            </th>
                            <th>
                                @if (session()->get('lang')=='english')
                               {{$namaz->jummah_english}}
                                @else
                                {{$namaz->jummah_bangla}}
                                @endif
                            </th>
                        </tr>
                      </table>


					<!-- Namaj Times -->
					<div class="cetagory-title-03">পুরানো সংবাদ  </div>
					<form action="" method="post">
						<div class="old-news-date">
						   <input type="text" name="from" placeholder="From Date" required="">
						   <input type="text" name="" placeholder="To Date">
						</div>
						<div class="old-date-button">
							<input type="submit" value="খুজুন ">
						</div>
				   </form>
				   <!-- news -->
				   <br><br><br><br><br>
				   <div class="cetagory-title-04">
                    @if (session()->get('lang')=='english')
                    Improtant Website
                     @else
                     গুরুত্বপূর্ণ ওয়েবসাইট
                     @endif
                    </div>
                        <div class="">
                            @foreach ($webstie as $row )
                                @if ($row->status==1)
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="#"><i class="fa fa-check" aria-hidden="true"></i>
                                        @if (session()->get('lang')=='english')
                                        {{$row->website_name_english}}
                                        @else
                                        {{$row->website_name_bangla}}
                                        @endif
                                    </a>
                                </h4>
                                </div>
                                @endif
                            @endforeach
                        </div>
				</div>
			</div>
			<!-- add-start -->
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="add"><img src="{{asset('frontend_assets')}}/assets/img/top-ad.jpg" alt="" /></div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="add"><img src="{{asset('frontend_assets')}}/assets/img/top-ad.jpg" alt="" /></div>
				</div>
			</div><!-- /.add-close -->

		</div>
	</section><!-- /.2nd-news-section-close --> --}}



	<!-- gallery-section-start -->
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title">
                        @if (session()->get('lang')=='english')
                            Photo Gallery
                        @else
                        ফটো  গ্রাল্লারি
                        @endif

                        </div>

					<div class="row">
                        @php
                            $photobig=DB::table('photos')->where('type',1)->orderBy('id','DESC')->first();
                            $photosmall=DB::table('photos')->where('type',0)->orderBy('id','DESC')->limit(5)->get()
                        @endphp
	                    <div class="col-md-8 col-sm-8">
                            @if ($photobig)
                            <div class="photo_screen">
                                @if ($photobig->status==1)
                                <div class="myPhotos" style="width:100%">
                                    <img src="{{asset('photos_gallery')}}/{{$photobig->photo}}"  alt="Avatar">
                                </div>
                                @endif
	                        </div>
                            @else
                                <img src="https://cdn.vectorstock.com/i/preview-1x/79/45/product-image-default-thumbnail-icon-graphic-web-vector-49027945.jpg" alt="NOT">
                            @endif
	                    </div>
	                    <div class="col-md-4 col-sm-4">
                            @if ($photosmall)
                            <div class="photo_list_bg">
                                @foreach ( $photosmall as $row )
                                <div class="photo_img photo_border active">
	                                <img src="{{asset('photos_gallery')}}/{{$row->photo}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
                                        @if (session()->get('lang')=='english')
                                        {{$row->title_english}}
                                        @else
                                        {{$row->title_bangla}}
                                        @endif
	                                </div>
	                            </div>
                                @endforeach
	                        </div>
                            @else
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmTQ_4y3lVTEMR9L3V76FtG79sAi-gg6ZrXdHdnwcRB8X8QYf5uKJxo8J37r6B9XuI9ZU&usqp=CAU" alt="">
                            @endif
	                    </div>
	                </div>

	                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                            <script>
                                    var slideIndex = 1;
                                    showDivs(slideIndex);

                                    function plusDivs(n) {
                                      showDivs(slideIndex += n);
                                    }

                                    function currentDiv(n) {
                                      showDivs(slideIndex = n);
                                    }

                                    function showDivs(n) {
                                      var i;
                                      var x = document.getElementsByClassName("myPhotos");
                                      var dots = document.getElementsByClassName("demo");
                                      if (n > x.length) {slideIndex = 1}
                                      if (n < 1) {slideIndex = x.length}
                                      for (i = 0; i < x.length; i++) {
                                         x[i].style.display = "none";
                                      }
                                      for (i = 0; i < dots.length; i++) {
                                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                      }
                                      x[slideIndex-1].style.display = "block";
                                      dots[slideIndex-1].className += " w3-opacity-off";
                                    }
                                </script>

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->

				</div>
				<div class="col-md-4 col-sm-5">
					<div class="gallery_cetagory-title">
                        @if (session()->get('lang')=='english')
                        Video Gallery
                        @else
                        ভিডিও  গ্রাল্লারি
                        @endif
                    </div>

					<div class="row">
                        @php
                        $videobig=DB::table('videos')->where('type',1)->orderBy('id','DESC')->first();
                        $videosmall=DB::table('videos')->where('type',0)->orderBy('id','DESC')->limit(3)->get()
                    @endphp
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/{{$videobig->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="gallery_sec owl-carousel">
                                @foreach ($videosmall as $row)
                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                        <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                        <iframe width="853" height="140" src="https://www.youtube.com/embed/{{$row->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                          showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                          showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                          var i;
                          var x = document.getElementsByClassName("myVideos");
                          var dots = document.getElementsByClassName("demo");
                          if (n > x.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = x.length}
                          for (i = 0; i < x.length; i++) {
                             x[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                          }
                          x[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

				</div>
			</div>
		</div>
	</section><!-- /.gallery-section-close -->


    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){
            $('select[name="district_id"]').on('change',function(){
                var district_id = $(this).val();
                if(district_id){
                    $.ajax({
                        url:"{{url('/get/subdistrict/frontend')}}/" +district_id,
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
