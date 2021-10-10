<?php

namespace App\Http\Controllers;

use App\Models\DeliverService;
use App\Models\Province;
use App\Models\StatusDeliver;
use App\Models\User;
use Illuminate\Http\Request;

class DeliverServiceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index1(User $id){
      $veget=DeliverService::where('deliver',$id->id)->get();
        return view('deliver.serviceboard',[
            'veget'=>$veget,
        ]);
    }
    public function index(){
        $active=StatusDeliver::all();
        $province=Province::all();
        return view('deliver.add',[
            'active'=>$active,
            'province'=>$province,
        ]);
    }
    public function store(Request $request,User $id){
        $this->validate($request,[
            'start'=>'required',
            'stop'=>'required',
            'duration'=>'required',
            'timeto'=>'required',
            'image'=>'required|image|max:1999',
            'timefrom'=>'required',
            'active'=>'required',
            'price'=>'required',
        ]);
        if($request->hasFile('image')){
            $filewithext=$request->file('image')->getClientOriginalName();
            $extension=$request->file('image')->getClientOriginalExtension();
            $filename=$filewithext.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/product_image/',$filename);
        }
        else{
            $filename='noimage.jph';
        }
        $deliver_service=new DeliverService();
        $deliver_service->start=$request->input('start');
        $deliver_service->stop=$request->input('stop');
        $deliver_service->timeto=$request->input('timeto');
        $deliver_service->timefrom=$request->input('timefrom');
        $deliver_service->duration=$request->input('duration');
        $deliver_service->active=$request->input('active');
        $deliver_service->image=$filename;
        $deliver_service->deliver=$id->id;
        $deliver_service->price=$request->input('price');
        $deliver_service->save();
        return redirect()->route('showdeliver');
    }
    public function show(){
        $deliver_service=DeliverService::all();
        return view('deliver.show',compact('deliver_service'));
    }
    public function destory(DeliverService $id){
        DeliverService::where('id',$id->id)->delete();
        return back();
    }
}
