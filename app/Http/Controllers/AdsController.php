<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
class AdsController extends Controller
{


    public function HorizontalVerticalAds(){
        $ads=DB::table('ads')->get();
        return view('dashboard.ads.horizontal',compact('ads'));
    }
    public function HorizontalVerticalAdsStore(Request $request){
        $data=array();
        $data['link']=$request->link;
        if($request->type==2){
            $image=$request->ads;
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make( $image)->resize(970, 70)->save(base_path('public/ads_image/'.$image_name),80);
            $data['ads']=$image_name;
            $data['type']=2;
            DB::table('ads')->insert($data);
            return back();
        }else{
            $image=$request->ads;
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make( $image)->resize(500, 500)->save(base_path('public/ads_image/'.$image_name),80);
            $data['ads']=$image_name;
            $data['type']=1;
            DB::table('ads')->insert($data);
            return back();
        }
    }

    public function HorizontalVerticalAdsEdit($id){
        $editAds=DB::table('ads')->where('id',$id)->first();
        return view('dashboard.ads.horizontalvertical_edit',compact('editAds'));
    }
    public function HorizontalVerticalAdsUpdate(Request $request,$id){
        $data=array();
        $data['link']=$request->link;
        $oldads=$request->oldads;
        if($request->type==2){
            $image=$request->ads;
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make( $image)->resize(970, 70)->save(base_path('public/ads_image/'.$image_name),80);
            $data['ads']=$image_name;
            $data['type']=2;
            DB::table('ads')->update($data);
            unlink(base_path('public/ads_image/'.$oldads));
            return back();
        }

        if($request->type==1){
            $image=$request->ads;
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make( $image)->resize(500, 500)->save(base_path('public/ads_image/'.$image_name),80);
            $data['ads']=$image_name;
            $data['type']=1;
            DB::table('ads')->update($data);
            unlink(base_path('public/ads_image/'.$oldads));
            return back();
        }


    }



    public function HorizontalVerticalAdsDelete($id){
        DB::table('ads')->where('id',$id)->delete();
        return back();
    }


}
