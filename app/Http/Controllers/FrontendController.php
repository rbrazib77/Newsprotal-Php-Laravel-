<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class FrontendController extends Controller
{
    public function index(){
        $category=DB::table('categories')->orderBy('id','ASC')->limit(9)->get();
        $livetv=DB::table('livetv')->first();
        $social=DB::table('socials')->first();
        $namaz=DB::table('namazs')->first();
        $webstie=DB::table('websties')->get();
        $notice=DB::table('notices')->first();
        $firstsectionsmall=DB::table('posts')->where('first_section',1)->orderBy('id',"DESC")->get();
        return view('frontend.index',compact('category','livetv','social','namaz','webstie','firstsectionsmall','notice'));
    }

    public function English(){
        Session::get('lang');
        session()->forget('lang');
        Session()->put('lang','english');
        return redirect()->back();

    }
    public function Bangla(){
        Session::get('lang');
        session()->forget('lang');
        Session()->put('lang','bangla');
        return redirect()->back();
    }

    public function SingelPost($id,$slug){
        $category=DB::table('categories')->orderBy('id','ASC')->get();
        $social=DB::table('socials')->first();
        $notice=DB::table('notices')->first();
        $posts=DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->join('subcategories','posts.subcategory_id','subcategories.id')
        ->join('users','posts.user_id','users.id')
        ->select('posts.*','categories.category_bangla','categories.category_english','subcategories.subcategory_bangla','subcategories.subcategory_english','users.name')
        ->where('posts.id',$id)
        ->first();
        return view('frontend.singlepost',compact('posts','category','social','notice'));
    }

    public function AllPost($id,$subcategory_bangla){
        $category=DB::table('categories')->orderBy('id','ASC')->get();
        $social=DB::table('socials')->first();
        $notice=DB::table('notices')->first();
        $posts=DB::table('posts')->where('subcategory_id',$id)->orderBY('id','DESC')->paginate(12);

        return view('frontend.allpost',compact('posts','category','social','notice'));
    }
    public function AllPostCategory($id,$category_bangla){
        $category=DB::table('categories')->orderBy('id','ASC')->get();
        $social=DB::table('socials')->first();
        $notice=DB::table('notices')->first();
        $posts=DB::table('posts')->where('category_id',$id)->orderBY('id','DESC')->paginate(12);
        return view('frontend.allpost',compact('posts','category','social','notice'));
    }


    public function GetSubDistrict($district_id){
        $sub=DB::table('subdistricts')->where('district_id',$district_id)->get();
        return response()->json($sub);
     }
     public function Saradesh(Request $request){
        $district_id=$request->district_id;
        $subdistrict_id=$request->subdistrict_id;
       $category=DB::table('categories')->orderBy('id','ASC')->get();
       $social=DB::table('socials')->first();
       $notice=DB::table('notices')->first();
       $posts=DB::table('posts')->where('district_id',$district_id)->where('subdistrict_id',$subdistrict_id)->orderBY('id','DESC')->paginate(12);
       return view('frontend.allpost',compact('posts','category','social','notice'));
     }

    public function Saradeshall(){
        $category=DB::table('categories')->orderBy('id','ASC')->get();
        $social=DB::table('socials')->first();
        $notice=DB::table('notices')->first();
        $posts=DB::table('posts')->paginate(20);
        return view('frontend.allpost',compact('posts','category','social','notice'));
    }

}
