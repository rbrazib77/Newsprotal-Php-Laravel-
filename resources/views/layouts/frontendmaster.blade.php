
@php
    $horizontal1=DB::table('ads')->where('type',2)->first();
    $vertical=DB::table('ads')->where('type',1)->first();
    $websiteSetting=DB::table('websitesettings')->first();
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>News Protal</title>
        <link href="{{asset('frontend_assets')}}/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{asset('frontend_assets')}}/assets/css/menu.css" rel="stylesheet">
        <link href="{{asset('frontend_assets')}}/assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{asset('frontend_assets')}}/assets/css/font-awesome.css" rel="stylesheet">
        <link href="{{asset('frontend_assets')}}/assets/css/responsive.css" rel="stylesheet">
        <link href="{{asset('frontend_assets')}}/assets/css/owl.carousel.min.css" rel="stylesheet">
        <link href="{{asset('frontend_assets')}}/assets/style.css" rel="stylesheet">

    </head>
    <body>
    <!-- header-start -->
	<section class="hdr_section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6 col-md-2 col-sm-4">
					<div class="header_logo" style="width: 60px; height: 60px;">
						<a href="{{route('index')}}"><img src="{{asset('websitesetting')}}/{{$websiteSetting->image}}"></a>
					</div>
				</div>
				<div class="col-xs-6 col-md-8 col-sm-8">
					<div id="menu-area" class="menu_area">
						<div class="menu_bottom">
							<nav role="navigation" class="navbar navbar-default mainmenu">
						<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!-- Collection of nav links and other content for toggling -->
								<div id="navbarCollapse" class="collapse navbar-collapse">

									<ul class="nav navbar-nav">
                                        @auth
                                        <li>
                                            <a href="{{url('login')}}">
                                                Admin
                                            </a>
                                        </li>
                                        @endauth
                                        @foreach ($category as $row)
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                @if (session()->get('lang')=='english')
                                                {{$row->category_english}}
                                                @else
                                                {{$row->category_bangla}}
                                                @endif
                                                <b class="caret"></b></a>
											@php
                                            $subcategory=DB::table('subcategories')->where('category_id',$row->id)->get();
                                            @endphp
                                            <ul class="dropdown-menu">
                                                @foreach ($subcategory as $row)
												<li><a href="{{URL::to('posts/'.$row->id.'/'.$row->subcategory_bangla)}}">
                                                    @if (session()->get('lang')=='english')
                                                    {{$row->subcategory_english}}
                                                    @else
                                                    {{$row->subcategory_bangla}}
                                                    @endif
                                                    </a>
                                                    </li>
                                                @endforeach
											</ul>
										</li>
                                        @endforeach
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-2 col-sm-12">
					<div class="header-icon">
						<ul>
							<!-- version-start -->
                            @if (session()->get('lang')=='bangla')
                            <li class="version"><a href="{{route('lang.english')}}">English</a></li>
                            @else
                            <li class="version"><a href="{{route('lang.bangla')}}">বাংলা</a></li>
                            @endif

							<!-- login-start -->

							<!-- search-start -->
							<li><div class="search-large-divice">
								<div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search" aria-hidden="true"></i></a>
									<div class="modal fade bd-example-modal-lg" action="" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-md-12">
															<div class="custom-search-input">
																<form>
																	<div class="input-group">
																		<input class="search form-control input-lg" placeholder="search" value="Type Here.." type="text">
																		<span class="input-group-btn">
																		<button class="btn btn-lg" type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
																	</span> </div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div></li>
							<!-- social-start -->
							<li>
								<div class="dropdown">
								  <button class="dropbtn-02"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
								  <div class="dropdown-content">
                                    <a href="{{$social->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
									<a href="{{$social->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
									<a href="{{$social->youtube}}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
									<a href="{{$social->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
									<a href="{{$social->linkedin}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i>Iinkedin</a>
								  </div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.header-close -->

    <!-- top-add-start -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<div class="top-add">
                        @if ($horizontal1==NULL)
                        @else
                       <a href=""> <img src="{{asset('ads_image')}}/{{$horizontal1->ads}}" alt="" /></a>
                        @endif
                    </div>
				</div>
			</div>
		</div>
	</section> <!-- /.top-add-close -->

	<!-- date-start -->
    <section>
    	<div class="container-fluid">
            @php
            function bn_date($str){
                $en=array(1,2,3,4,5,6,7,8,9,0);
                $bn=array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
                $str=str_replace($en,$bn,$str);
                $en=array('January','February','March','April','May','June','July','August','September','October','November','December');
                $en_short=array('Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec');
                $bn=array('জানুয়ারি','ফেব্রুয়ারি','মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
                $str=str_replace($en,$bn,$str);
                $str=str_replace($en_short,$bn,$str);
                $en=array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
                $en_short=array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
                $bn_short=array('শনি','রবি','সোম','মঙ্গল','বুধ','বৃহ','শুক্র');
                $bn=array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
                $str=str_replace($en,$bn,$str);
                $str=str_replace($en_short,$bn_short,$str);
                $en=array('pm','am');
                $bn=array('অপরাহ্ন','অপরাহ্ন');
                $str=str_replace($en,$bn,$str);
                $str=str_replace($en_short,$bn_short,$str);
                $en=array('12','২4');
                $bn=array('৬','১২');
                $str=str_replace($en,$bn,$str);
                return $str;
            }
            @endphp

    		<div class="row">
    			<div class="col-md-12 col-sm-12">
					<div class="date">
						<ul>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i>
                                @if (session()->get('lang')=='english')
                                Dhaka
                                @else
                                ঢাকা
                                @endif
                                </li>
							<li><i class="fa fa-calendar" aria-hidden="true"></i>
                                @if (session()->get('lang')=='english')
                                {{date('d M Y,l,h:i:s,a')}}
                                 @else
                                 {{bn_date(date('d M Y,l'))}}
                                 @endif
                             </li>
                            <span> <script type="text/javascript" src="http://bangladate.appspot.com/index1.php"></script></span>
						</ul>

					</div>
				</div>
    		</div>
    	</div>
    </section><!-- /.date-close -->

	<!-- notice-start -->

    <section>
        @php

        $headline=DB::table('posts')
                 ->join('categories','posts.category_id','categories.id')
                 ->join('subcategories','posts.subcategory_id','subcategories.id')
                 ->select('posts.*','categories.category_bangla','subcategories.subcategory_bangla')
                 ->where('posts.headline',1)
                 ->orderBY('id','DESC')
                 ->limit(5)
                 ->get();
        @endphp
    	<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 ">
                    @if (session()->get('lang')=='english')
                    Headline:
                    @else
                    শিরোনাম :
                    @endif
				</div>
				<div class="col-md-10 col-sm-9 scroll_02">

					<marquee>
                        @foreach ($headline as $row)
                        <a href="">
                            @if (session()->get('lang')=='english')
                            * {{$row->title_english}}
                            @else
                               * {{$row->title_bangla}}
                            @endif
                        </a>
                        @endforeach
                    </marquee>
				</div>
			</div>
    	</div>
        @if ($notice->status == 1)
        <div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 ">
                    @if (session()->get('lang')=='english')
                    Notice:
                    @else
                    নোটিশ:
                    @endif
				</div>
				<div class="col-md-10 col-sm-9 scroll_02">

					<marquee>
                            @if (session()->get('lang')=='english')
                            * {{$notice->notice_english}}
                            @else
                               * {{$notice->notice_bangla}}
                            @endif
                    </marquee>
				</div>
			</div>
    	</div>
        @endif
    </section>

    @yield('content')

	<!-- top-footer-start -->
	<section>
		<div class="container-fluid">
			<div class="top-footer">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<div class="foot-logo" style="width: 60px; height: 60px;">
                            <a href="{{route('index')}}"><img src="{{asset('websitesetting')}}/{{$websiteSetting->image}}"></a>
						</div>
					</div>
					<div class="col-md-6 col-sm-4">
						 <div class="social">
                            <ul>
                                <li><a title="Facebook" href="{{$social->facebook}}" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                                <li><a title="Twitter" href="{{$social->twitter}}" target="_blank" class="instagram"> <i class="fa fa-twitter"></i></a></li>
                                <li><a title="Youtube" href="{{$social->youtube}}" target="_blank" class="android"> <i class="fa fa-youtube"></i></a></li>
                                <li><a title="Instagram" href="{{$social->instagram}}" target="_blank" class="linkedin"> <i class="fa fa-instagram"></i></a></li>
                                <li><a title="Linkedin" href="{{$social->linkedin}} " target="_blank" class="youtube"> <i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
					</div>
					<div class="col-md-3 col-sm-4">
						<div class="apps-img">
							<ul>
								<li><a href="#"><img src="{{asset('frontend_assets')}}/assets/img/apps-01.png" alt="" /></a></li>
								<li><a href="#"><img src="{{asset('frontend_assets')}}/assets/img/apps-02.png" alt="" /></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.top-footer-close -->

	<!-- middle-footer-start -->
	<section class="middle-footer">
		<div class="container-fluid">
			<div class="row">
                @php
                      $category1=DB::table('categories')->take(5)->get();
                      $category2=DB::table('categories')->skip(5)->take(5)->get();
                @endphp
				<div class="col-md-4 col-sm-4">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="editor-one">
                                @foreach ($category1 as $row)
                                <a href="  {{URL::to('post/'.$row->id.'/'.$row->category_bangla)}}" style="color: white">
                                    <li style="list-style: none">
                                        @if (session()->get('lang')=='english')
                                        {{$row->category_english}}
                                        @else
                                        {{$row->category_bangla}}
                                        @endif
                                    </li>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="editor-one">
                                @foreach ($category2 as $row)
                                <a href="  {{URL::to('post/'.$row->id.'/'.$row->category_bangla)}}" style="color: white">

                                <li style="list-style: none">
                                    @if (session()->get('lang')=='english')
                                    {{$row->category_english}}
                                    @else
                                    {{$row->category_bangla}}
                                    @endif
                                </li>
                               </a>
                               @endforeach
                            </div>
                        </div>
                    </div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-two">

					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-three">
                        @if (session()->get('lang')=='english')
                        {{$websiteSetting->phone_english}}
                        @else
                       {{$websiteSetting->phone_bangla}}
                        @endif

                        <div> {{$websiteSetting->email}}</div>

                        @if (session()->get('lang')=='english')
                        {!!$websiteSetting->address_english!!}
                        @else
                       {!!$websiteSetting->address_bangla!!}
                        @endif
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.middle-footer-close -->

	<!-- bottom-footer-start -->
	<section class="bottom-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="copyright">
						All rights reserved © {{Carbon\Carbon::now()->format('d-m-Y')}} RB Dev's
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="btm-foot-menu">
						<ul>
							<li>
                                <a href="#">
                                    @if (session()->get('lang')=='english')
                                    About US
                                    @else
                                    আমাদের সম্পর্কে
                                    @endif
                                </a>
                                </li>
							<li>
                                <a href="#">
                                    @if (session()->get('lang')=='english')
                                   Contact Us
                                    @else
                                    যোগাযোগ করুন
                                    @endif
                                    </a>
                            </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

		<script src="{{asset('frontend_assets')}}/assets/js/jquery.min.js"></script>
		<script src="{{asset('frontend_assets')}}/assets/js/bootstrap.min.js"></script>
		<script src="{{asset('frontend_assets')}}/assets/js/main.js"></script>
		<script src="{{asset('frontend_assets')}}/assets/js/owl.carousel.min.js"></script>
	</body>
</html>
