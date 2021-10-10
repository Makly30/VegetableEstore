<?php

namespace App\Http\Controllers;

use App\Models\DeliverList;
use App\Models\DeliverService;
use App\Models\OrderV;
use App\Models\ProcessTracking;
use App\Models\Product;
use App\Models\Province;
use App\Models\Tracking;
use App\Models\User;
use Illuminate\Http\Request;

class DeliverListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(DeliverService $id,User $owner){
      
        $product=Product::where('user_id',$owner->id)->get();
        foreach($product as $p){
            $order=OrderV::where('product_id',$p->id)->where('tracking',null)->get();

                   
        }
        $deliver_service=DeliverService::where('id',$id->id)->get();
 
        return view('deliverboard.index',[
            'deliver_service'=>$deliver_service,
           
           'order'=>$order,
        ]);
  
    }

    public function add(Request $request,DeliverService $deliver_service,User $seller,User $deliver){
        $this->validate($request,[
            'orp'=>'required',
        ]);
        $deliver_list=new DeliverList();
        $deliver_list->orp=$request->orp;
        $deliver_list->deliver=$deliver->id;
        $deliver_list->deliver_service=$deliver_service->id;
        $deliver_list->seller=$seller->id;
        $deliver_list->save();
        $tracking=new Tracking();
        $tracking->orp=$request->orp;
        $tracking->deliver_list=$deliver_list->id;
        $tracking->process_status=2;
        $tracking->save();
        $order=OrderV::where('id',$request->orp)->update(['tracking'=>$tracking->id]);
        return redirect()->route('deliverservice.showcustomer',auth()->user()->id);
    }
    
    public function show(User $id){
        $deliver_list=DeliverList::where('seller',$id->id)->get();

        return view('deliver.customer',[
            'deliver_list'=>$deliver_list,
        ]);
    }
    public function showorder(User $id){
        $deliver_list=DeliverList::where('deliver',$id->id)->get();

        return view('deliver.customer_service',[
            'deliver_list'=>$deliver_list,
        ]);
    
    }
    public function showdetailcus(DeliverList $dlist){
        $deliver_list=DeliverList::where('id',$dlist->id)->get();
        $tracking=Tracking::where('deliver_list',$dlist->id)->get();
        return view('seller.deliver_detail',[
            'deliver_list'=>$deliver_list,
            'tracking'=>$tracking,
        ]);
    }
    public function showdetaildeliver(DeliverList $dlist){
        $deliver_list=DeliverList::where('id',$dlist->id)->get();
        return view('deliver.detail',compact('deliver_list'));
    }
    public function updatelocation(DeliverList $id){
            $status=ProcessTracking::all();
            $tracking=Tracking::where('deliver_list',$id->id)->get();
                    return view('deliver.updatelocation',[
                        'tracking'=>$tracking,
                        'status'=>$status,
                    ]);
        
        
    }
    public function updatelocal(Tracking $id,Request $request){
        $tracking=Tracking::where('id',$id->id)->update(['tr_place'=>$request->input('location'),'process_status'=>$request->input('process')]);
        
        return redirect()->route('deliverservice.showorder',auth()->user()->id);
    }
}
