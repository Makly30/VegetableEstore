<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
        $veget=Product::all();
        return view('pages.vegetable',compact('veget'));
    }
    public function showonlyown(){
        $veget=Product::all();
        return view('seller.product',compact('veget'));
    }
    public function add(){
        return view('seller.add');
    }
    public function store(Request $request){
        $this->validate($request,[
            'product_name'=>'required',
            'product_price'=>'required',
            'amount'=>'required',
            'measure'=>'required',
            'deliver_in'=>'required',
            'deliver_out'=>'required',
            'province_from'=>'required',
            'available_time'=>'required',
            'timefrom'=>'required',
            'timeto'=>'required',
            'image'=>'required|image|max:1999',
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
        $request->user()->product()->create(
           [ 'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'amount'=>$request->amount,
            'firstamount'=>$request->amount,
            'timefrom'=>$request->input('timefrom'),
            'timeto'=>$request->input('timeto'),
            'measure'=>$request->measure,
            'deliver_in'=>$request->deliver_in,
            'deliver_out'=>$request->deliver_out,
            'province_from'=>$request->province_from,
            'available_time'=>$request->available_time,
            'image'=>$filename,
            ]
        );
        return redirect()->route('vegetable');
        }
        public function destroy(Request $request,Product $id){
        
       
              Product::where('id',$id->id)->delete();
            return back();
   
        }

}
