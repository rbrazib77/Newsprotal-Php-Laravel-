<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;
use DB;
class GalleryController extends Controller
{


    public function create(Request $request){
        $photo=DB::table('photos')->get();
        return view('dashboard.photo.create',compact('photo'));
        return back();
    }
     public function store(Request $request){
        $data=array();
        $data['title_bangla']=$request->title_bangla;
        $data['title_english']=$request->title_english;
        $data['type']=$request->type;
        $data['status']=$request->status;
        $data['created_at']=Carbon::now();
        $image=$request->photo;
        if($image){
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make( $image)->resize(300, 200)->save(base_path('public/photos_gallery/'.$image_name),80);
            $data['photo']=$image_name;
            DB::table('photos')->insert($data);
            return back();
        }else{
            return back();
        }

    }
     public function destroy ($id){
        DB::table('photos')->where('id',$id)->delete();
        return back();

     }
      public function edit ($id){
        $photo=DB::table('photos')->where('id',$id)->first();
        return view('dashboard.photo.edit',compact('photo'));

     }

     public function update(Request $request,$id){
        $request->validate([
            'title_bangla'=>'required',
            'title_english'=>'required',
            'photo'=>'required',
            'type'=>'required'
        ]);
        $data=array();
        $data['title_bangla']=$request->title_bangla;
        $data['title_english']=$request->title_english;
        $data['type']=$request->type;
        $data['status']=$request->status;
        $oldphoto=$request->oldphoto;
        $photo=$request->photo;
        if($photo){
            $image_name=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make( $photo)->resize(300, 200)->save(base_path('public/photos_gallery/'.$image_name),80);
            $data['photo']=$image_name;
            DB::table('photos')->where('id',$id)->update($data);
            unlink(base_path('public/photos_gallery/'.$oldphoto));
            return back();

        }else{
            return back();
        }
    }

    public function ActiveDeactive($id){
        $getstatus= DB::table('photos')->select('status')->where('id',$id)->first();
        if($getstatus->status==1){
         $status=0;
        }else{
         $status=1;
        }
        DB::table('photos')->where('id',$id)->update(['status'=>$status]);
         return back();
     }

    public function Videocreate(Request $request){
        $video=DB::table('videos')->get();
        return view('dashboard.video.create',compact('video'));
        return back();
    }
     public function Videostore(Request $request){
        $data=array();
        $data['title']=$request->title;
        $data['embed_code']=$request->embed_code;
        $data['type']=$request->type;
        $data['created_at']=Carbon::now();
        DB::table('videos')->insert($data);
        return back();
    }


    public function Videodestroy ($id){
        DB::table('videos')->where('id',$id)->delete();
        return back();

     }
}
