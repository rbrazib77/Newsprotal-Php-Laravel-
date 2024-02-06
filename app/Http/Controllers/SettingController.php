<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class SettingController extends Controller
{
    public function SocialSetting(){
           // $request->validate([
        //     'facebook;'=>'required',
        //     'twitter'=>'required',
        //     'youtube'=>'required',
        //     'instagram'=>'required',
        //     'linkedin'=>'required'
        // ]);
        $socials=DB::table('socials')->first();
        return view('dashboard.setting.social',compact('socials'));
    }

    public function UpdateSocial(Request $request,$id){
        // $request->validate([
        //     'facebook;'=>'required',
        //     'twitter'=>'required',
        //     'youtube'=>'required',
        //     'instagram'=>'required',
        //     'linkedin'=>'required'
        // ]);

        $data=array();
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['youtube']=$request->youtube;
        $data['instagram']=$request->instagram;
        $data['linkedin']=$request->linkedin;
        $data['created_at']=Carbon::now();
        DB::table('socials')->where('id',$id)->update($data);
        return back();
    }

    public function ScoSetting(){
        $scos=DB::table('scos')->first();
        return view('dashboard.setting.sco',compact('scos'));
    }
    public function UpdateSco(Request $request,$id){

        $data=array();
        $data['meta_author']=$request->meta_author;
        $data['meta_title']=$request->meta_title;
        $data['meta_keyword']=$request->meta_keyword;
        $data['meta_discription']=$request->meta_discription;
        $data['google_analytics']=$request->google_analytics;
        $data['alexa_analytics']=$request->alexa_analytics;
        $data['created_at']=Carbon::now();
        DB::table('scos')->where('id',$id)->update($data);
        return back();
    }


    public function NamazSetting(){
        $namazs=DB::table('namazs')->first();
        return view('dashboard.setting.namaz',compact('namazs'));
    }

    public function UpdateNamaz(Request $request,$id){
        $data=array();
        $data['fajr_bangla']=$request->fajr_bangla;
        $data['fajr_english']=$request->fajr_english;
        $data['johr_bangla']=$request->johr_bangla;
        $data['johr_english']=$request->johr_english;
        $data['asor_bangla']=$request->asor_bangla;
        $data['asor_english']=$request->asor_english;
        $data['magrib_bangla']=$request->magrib_bangla;
        $data['magrib_english']=$request->magrib_english;
        $data['asha_bangla']=$request->asha_bangla;
        $data['asha_english']=$request->asha_english;
        $data['jummah_bangla']=$request->jummah_bangla;
        $data['jummah_english']=$request->jummah_english;
        $data['created_at']=Carbon::now();
        DB::table('namazs')->where('id',$id)->update($data);
        return back();
    }

    // embed_code
    // status

    public function liveTvSetting(){
        $livetv=DB::table('livetv')->first();
        return view('dashboard.setting.livetv',compact('livetv'));
    }

    public function UpdateLivetv(Request $request,$id){
        $data=array();
        $data['embed_code']=$request->embed_code;
        $data['created_at']=Carbon::now();
        DB::table('livetv')->where('id',$id)->update($data);
        return back();
    }


    public function ActiveLivetv(Request $request,$id){
        DB::table('livetv')->where('id',$id)->update(['status'=>1]);
        return back();
    }

       public function DeactiveLivetv(Request $request,$id){
        DB::table('livetv')->where('id',$id)->update(['status'=>0]);
        return back();
    }



    public function NoticeSetting(){
        $notice=DB::table('notices')->first();
        return view('dashboard.setting.notice',compact('notice'));
    }


    public function UpdateNotice(Request $request,$id){
        $data=array();
        $data['notice_bangla']=$request->notice_bangla;
        $data['notice_english']=$request->notice_english;
        $data['created_at']=Carbon::now();
        DB::table('notices')->where('id',$id)->update($data);
        return back();
    }



    public function  ActiveNotice(Request $request,$id){
        DB::table('notices')->where('id',$id)->update(['status'=>1]);
        return back();
    }

       public function DeactiveNotice(Request $request,$id){
        DB::table('notices')->where('id',$id)->update(['status'=>0]);
        return back();
    }

    public function create(Request $request){
        $website=DB::table('websties')->get();
         return view('dashboard.setting.website.create',compact('website'));
         return back();
    }

    public function store(Request $request){
       $data=array();
       $data['website_name_bangla']=$request->website_name_bangla;
       $data['website_name_english']=$request->website_name_english;
       $data['website_link']=$request->website_link;
       $data['status']=$request->status;
       $data['created_at']=Carbon::now();
       DB::table('websties')->insert($data);
       return back();
   }

   public function destroy($id){
        DB::table('websties')->where('id',$id)->delete();
        return back();
   }
    public function edit($id){
        $website=DB::table('websties')->where('id',$id)->first();
        return view('dashboard.setting.website.edit',compact('website'));
        return back();
   }
    public function update(Request $request,$id){
        $data=array();
        $data['website_name_bangla']=$request->website_name_bangla;
        $data['website_name_english']=$request->website_name_english;
        $data['website_link']=$request->website_link;
        $data['status']=$request->status;
        $data['created_at']=Carbon::now();
        DB::table('websties')->where('id',$id)->update($data);
        return back();
    }

    public function GetStatusWebsite($id){
       $getstatus= DB::table('websties')->select('status')->where('id',$id)->first();
       if($getstatus->status==1){
        $status=0;
       }else{
        $status=1;
       }
       DB::table('websties')->where('id',$id)->update(['status'=>$status]);
        return back();
    }

}
