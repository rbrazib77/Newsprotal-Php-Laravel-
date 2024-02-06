<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;
use DB;

class WebSiteSettingController extends Controller
{
    public function WebsiteSetting(){
        $WebsiteSetting=DB::table('websitesettings')->first();
        return view('dashboard.setting.website_setting.website_setting',compact('WebsiteSetting'));
    }
    public function WebsiteSettingUpdate(Request $request,$id){
        // $request->validate([
        //     'category_id'=>'required',
        //     'district_id'=>'required',
        //     'image'=>'required'
        // // ]);
        $data=array();
        $data['address_bangla']=$request->address_bangla;
        $data['address_english']=$request->address_english;
        $data['phone_bangla']=$request->phone_bangla;
        $data['phone_english']=$request->phone_english;
        $data['email']=$request->email;
        $oldimage=$request->oldimage;
        $image=$request->image;
        if($image){
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make( $image)->resize(300, 200)->save(base_path('public/websitesetting/'.$image_name),80);
            $data['image']=$image_name;
            DB::table('websitesettings')->where('id',$id)->update($data);
            unlink(base_path('public/websitesetting/'.$oldimage));
            return back();
        }else{
            return back()->with('error',"Image Is Not ");
        }
        return back();

    }
}
