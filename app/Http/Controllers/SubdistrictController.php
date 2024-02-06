<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class SubdistrictController extends Controller
{
    public function index(){
        $district=DB::table('districts')->get();
        $subdistrict=DB::table('subdistricts')->join('districts','subdistricts.district_id','districts.id')->select('districts.district_bangla','subdistricts.*')->paginate(10);
       return view('dashboard.districts.subdistrict.index',compact('subdistrict','district'));
    }

    public function store(Request $request){
         $request->validate([
            'subdistrict_bangla'=>'required',
            'subdistrict_english'=>'required',
            'district_id'=>'required'
        ]);

        $data=array();
        $data['subdistrict_bangla']=$request->subdistrict_bangla;
        $data['subdistrict_english']=$request->subdistrict_english;
        $data['district_id']=$request->district_id;
        $data['created_at']=Carbon::now();
        DB::table('subdistricts')->insert($data);
        return back();
    }

    public function delete($id){
        DB::table('subdistricts')->where('id',$id)->delete();
        return back();
    }

    public function edit($id){
        $subdistricts= DB::table('subdistricts')->where('id',$id)->first();
        $district=DB::table('districts')->get();
        return view('dashboard.districts.subdistrict.edit',compact('subdistricts','district'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'subdistrict_bangla'=>'required',
            'subdistrict_english'=>'required',
            'district_id'=>'required',
        ]);
        $data=array();
        $data['subdistrict_bangla']=$request->subdistrict_bangla;
        $data['subdistrict_english']=$request->subdistrict_english;
        $data['district_id']=$request->district_id;
        $data['created_at']=Carbon::now();
        DB::table('subdistricts')->where('id',$id)->update($data);
        return redirect()->route('subdistrict.index');
    }
}
