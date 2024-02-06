<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class SubcategoeyController extends Controller
{
   public function index(){
    $category=DB::table('categories')->get();
    $subcategory=DB::table('subcategories')->join('categories','subcategories.category_id','categories.id')->select('categories.category_bangla','subcategories.*')->paginate(10);
    return view('dashboard.categories.subcategory.index',compact('category','subcategory'));
   }

   public function store(Request $request){
    $request->validate([
        'subcategory_bangla'=>"required",
        'subcategory_english'=>"required",
        'category_id'=>"required"
    ]);

    $data=array();
    $data['subcategory_bangla']=$request->subcategory_bangla;
    $data['subcategory_english']=$request->subcategory_english;
    $data['category_id']=$request->category_id;
    $data['created_at']=Carbon::now();
    DB::table('subcategories')->insert($data);
    return back();
   }

   public function delete($id){
    DB::table('subcategories')->where('id',$id)->delete();
    return back();
   }
    public function edit($id){
        $subcategorys= DB::table('subcategories')->where('id',$id)->first();
        $category=DB::table('categories')->get();
        return view('dashboard.categories.subcategory.edit',compact('subcategorys','category'));
   }

   public function update(Request $request,$id){
    $request->validate([
        'subcategory_bangla'=>"required",
        'subcategory_english'=>"required",
        'category_id'=>"required"
    ]);
    $data=array();
    $data['subcategory_bangla']=$request->subcategory_bangla;
    $data['subcategory_english']=$request->subcategory_english;
    $data['category_id']=$request->category_id;
    $data['created_at']=Carbon::now();
    DB::table('subcategories')->where('id',$id)->update($data);
    return redirect()->route('subcategory.index');
   }
}
