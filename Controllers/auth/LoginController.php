<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required',
        ]);
        auth()->attempt(['name'=>$request->input('name'),'password'=>$request->input('password')]);
        if(! auth()->attempt(['name'=>$request->input('name'),'password'=>$request->input('password')])){
            return back()->with('status','account is invalid!');
        }else{
             return redirect()->route('home');
        }  
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
    public function myinfo(User $id){
        $info=User::where('id',$id->id)->get();
        return view('auth.myinfo',[
            'info'=>$info,
        ]);
    }
    public function edit(User $id){
        $user=User::where('id',$id->id)->get();
        return view('auth.edit',compact('user'));
    }
    public function update(User $id,Request $request){
        
        $this->validate($request,[
            'Current_password' => ['required', new MatchOldPassword],
            'name'=>'required',
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
            'phone'=>'required',
            'address'=>'required',
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
        $user=User::where('id',$id->id)->update([
            'name'=>$request->input('name'),
            'fname'=>$request->input('fname'),
            'lname'=>$request->input('lname'),
            'phone'=>$request->input('phone'),
            'address'=>$request->input('address'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'image'=>$filename2store,
        ]);
        $user1=User::where('id',$id->id)->get();
       
        return redirect()->route('myinfo',$user1->id);
    }
}
