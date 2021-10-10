<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
            'phone'=>'required',
            'address'=>'required',
            'status'=>'required',
            'image'=>'required|image|max:1999',
        ]);
       
        if($request->hasFile('image')){
            $filewithext=$request->file('image')->getClientOriginalName();
            $extension=$request->file('image')->getClientOriginalExtension();
            $filename2store=$filewithext.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/covers',$filename2store);
        }else{
            $filename2store='noimage.jpg';
        }
        $user=new User();
        $user->name=$request->input('name');
        $user->fname=$request->input('fname');
        $user->lname=$request->input('lname');
        $user->phone=$request->input('phone');
        $user->address=$request->input('address');
        $user->email=$request->input('email');
        $user->status=$request->input('status');
        $user->password=Hash::make($request->input('password'));
        $user->image=$filename2store;
        $user->save();
        auth()->attempt(['name'=>$request->input('name'),'password'=>$request->input('password')]);
        return redirect()->route('home');
    }
}
