<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
class DistrictController extends Controller
{
    public function index (){
        $districts=DB::table('districts')->paginate(10);
        return view('dashboard.districts.district.index',compact('districts'));
    }

    public function store(Request $request){
        $request->validate([
            'district_bangla'=>'required',
            'district_english'=>'required',
        ]);

        $data=array();
        $data['district_bangla']=$request->district_bangla;
        $data['district_english']=$request->district_english;
        $data['created_at']=Carbon::now();
        DB::table('districts')->insert($data);
        return back();
    }

    public function delete($id){
        DB::table('districts')->where('id',$id)->delete();
        return back();
    }
    public function edit ($id){
       $districts= DB::table('districts')->where('id',$id)->first();;
        return view('dashboard.districts.district.edit',compact('districts'));
    }

  public function update(Request $request,$id){
    $request->validate([
        'district_bangla'=>'required',
        'district_english'=>'required',
    ]);

    $data=array();
    $data['district_bangla']=$request->district_bangla;
    $data['district_english']=$request->district_english;
    $data['created_at']=Carbon::now();
    DB::table('districts')->where('id',$id)->update($data);
    return redirect()->route('district.index');
    }
}
