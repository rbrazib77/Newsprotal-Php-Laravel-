<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class CategoeyController extends Controller
{
    public function index(){
        $categorys=DB::table('categories')->get();
        return view('dashboard.categories.category.index',compact('categorys'));
    }
     public function store(Request $request){
        $request->validate([
            'category_bangla'=>'required',
            'category_english'=>'required'
        ]);

        $data=array();
        $data['category_bangla']=$request->category_bangla;
        $data['category_english']=$request->category_english;
        $data['created_at']=Carbon::now();
        DB::table('categories')->insert($data);
        return back();
    }

    public function delete($id){
        DB::table('categories')->where('id',$id)->delete();
        return back();
    }
    public function edit($id){
        $categorys= DB::table('categories')->where('id',$id)->first();
        return view('dashboard.categories.category.edit',compact('categorys'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'category_bangla'=>'required',
            'category_english'=>'required'
        ]);

        $data=array();
        $data['category_bangla']=$request->category_bangla;
        $data['category_english']=$request->category_english;
        $data['created_at']=Carbon::now();
        DB::table('categories')->where('id',$id)->update($data);
        return redirect()->route('category.index');



    }
}
