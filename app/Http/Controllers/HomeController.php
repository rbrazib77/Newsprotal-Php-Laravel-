<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexUser(){
        $writer=DB::table('users')->where('type',0)->get();
        return view('dashboard.user_role.index_user',compact('writer'));
    }


     public function insertUser(){
        return view('dashboard.user_role.insert_user');
    }
     public function editUser($id){
        $editWriter=DB::table('users')->where('id',$id)->first();
        return view('dashboard.user_role.edit_user',compact('editWriter'));
    }
     public function storeUser(Request $request){
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $data['category']=$request->category;
        $data['district']=$request->district;
        $data['post']=$request->post;
        $data['setting']=$request->setting;
        $data['gallery']=$request->gallery;
        $data['ads']=$request->ads;
        $data['role']=$request->role;
        $data['type']=0;
        DB::table('users')->insert($data);
        return back();
    }

    public function updateUser(Request $request,$id){
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['category']=$request->category;
        $data['district']=$request->district;
        $data['post']=$request->post;
        $data['setting']=$request->setting;
        $data['gallery']=$request->gallery;
        $data['ads']=$request->ads;
        $data['role']=$request->role;
        $data['type']=0;
        DB::table('users')->where('id',$id)->update($data);
        return Redirect()->route('index.writer');
    }

}
