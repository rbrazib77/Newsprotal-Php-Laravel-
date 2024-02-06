<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
use Auth;

class PostController extends Controller
{
//all post show here
    public function index(){
        // $post=DB::table('posts')
        //         ->join('categories','posts.category_id','categories.id')
        //         ->join('subcategories','posts.subcategory_id','subcategories.id')
        //         ->join('districts','posts.district_id','districts.id')
        //         ->join('subdistricts','posts.subdistrict_id','subdistricts.id')
        //         ->get();
        $posts=DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->join('subcategories','posts.subcategory_id','subcategories.id')
        ->select('posts.*','categories.category_bangla','subcategories.subcategory_bangla')
        ->paginate(5);
        return view('dashboard.post.index',compact('posts'));
    }
//post insert form
    public function create(){
        $category=DB::table('categories')->get();
        $district=DB::table('districts')->get();
        return view('dashboard.post.create',compact('category','district'));
    }

//store post
     public function store(Request $request){
        $request->validate([
            'category_id'=>'required',
            'district_id'=>'required'
        ]);
        $data=array();
        $data['title_bangla']=$request->title_bangla;
        $data['title_english']=$request->title_english;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['district_id']=$request->district_id;
        $data['subdistrict_id']=$request->subdistrict_id;
        $data['user_id']=Auth::id();
        $data['details_bangla']=$request->details_bangla;
        $data['details_english']=$request->details_english;
        $data['tags_bangla']=$request->tags_bangla;
        $data['tags_english']=$request->tags_english;
        $data['headline']=$request->headline;
        $data['first_section']=$request->first_section;
        $data['first_section_thumbnail']=$request->first_section_thumbnail;
        $data['bigthumbnail']=$request->bigthumbnail;
        $data['post_date']=date('d-m-Y');
        $data['post_month']=date('F');

        $image=$request->image;
        if($image){
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make( $image)->resize(300, 200)->save(base_path('public/postimages/'.$image_name),80);
            $data['image']=$image_name;
            DB::table('posts')->insert($data);
            return back();

        }else{
            return back();
        }

     }

    // Post destroy
    public function destroy($id){
        DB::table('posts')->where('id',$id)->delete();
        return back();
    }
 // Post edit
    public function edit($id){
       $posts= DB::table('posts')->where('id',$id)->first();
       $category=DB::table('categories')->get();
       $district=DB::table('districts')->get();
        return view('dashboard.post.edit',compact('posts','category','district')) ;
    }

    public function update(Request $request,$id){
        $request->validate([
            'category_id'=>'required',
            'district_id'=>'required',
            'image'=>'required'
        ]);
        $data=array();
        $data['title_bangla']=$request->title_bangla;
        $data['title_english']=$request->title_english;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['district_id']=$request->district_id;
        $data['subdistrict_id']=$request->subdistrict_id;
        $data['details_bangla']=$request->details_bangla;
        $data['details_english']=$request->details_english;
        $data['tags_bangla']=$request->tags_bangla;
        $data['tags_english']=$request->tags_english;
        $data['headline']=$request->headline;
        $data['first_section']=$request->first_section;
        $data['first_section_thumbnail']=$request->first_section_thumbnail;
        $data['bigthumbnail']=$request->bigthumbnail;
        $data['post_date']=date('d-m-Y');
        $data['post_month']=date('F');
        $oldimage=$request->oldimage;
        $image=$request->image;
        if($image){
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make( $image)->resize(300, 200)->save(base_path('public/postimages/'.$image_name),80);
            $data['image']=$image_name;
            DB::table('posts')->where('id',$id)->update($data);
            unlink(base_path('public/postimages/'.$oldimage));
            return back();
        }else{
            return back()->with('error',"Image Is Not ");
        }
    }


     public function Getsubcatagory($category_id){
        $sub=DB::table('subcategories')->where('category_id',$category_id)->get();
        return response()->json($sub);
     }

     public function Getsubdistrict($district_id){
        $sub=DB::table('subdistricts')->where('district_id',$district_id)->get();
        return response()->json($sub);
     }

}
