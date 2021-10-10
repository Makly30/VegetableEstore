<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataProcessController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);        
    }
    public function mydata(User $id){
        $order=app('db')->select("select sum(CASE WHEN order_vegetable.deliver_choice_id=1 THEN round((product.product_price*order_vegetable.orp_amount)/ product.measure+product.deliver_in,2) ELSE round((product.product_price*order_vegetable.orp_amount)/ product.measure+product.deliver_out,2)END) as total, MONTH(order_vegetable.created_at)month_total from order_vegetable JOIN product on order_vegetable.product_id=product.id join users on product.user_id=users.id where product.user_id=".$id->id." group by month_total ;");
        $data = [];
        
     
        foreach($order as $row){
            $data['label'][] = $row->month_total;
            $data['data'][] = (float)$row->total;
        }
        $data['chart_data'] = json_encode($data);
        
        return view('seller.mydataprocess',$data);
    }
    public function expense(User $id){
        $order=app('db')->select("select sum(deliver_service.price) as total, MONTH(deliver_list.created_at)month_total from deliver_list JOIN deliver_service on deliver_list.deliver_service=deliver_service.id join users on deliver_list.seller=users.id where users.id=".$id->id." group by month_total ;");
        $data = [];
        
     
        foreach($order as $row){
            $data['label'][] = $row->month_total;
            $data['data'][] = (float)$row->total;
        }
        $data['chart_data'] = json_encode($data);
        
        return view('seller.expense',$data);
    }
    public function order(User $id){
        $order=app('db')->select("select count(order_vegetable.id) as total, MONTH(order_vegetable.created_at)month_total from order_vegetable JOIN product on order_vegetable.product_id=product.id join users on product.user_id=users.id where users.id=".$id->id." group by month_total ;");
        $data = [];
        
     
        foreach($order as $row){
            $data['label'][] = $row->month_total;
            $data['data'][] = (float)$row->total;
        }
        $data['chart_data'] = json_encode($data);
        
        return view('seller.dataorder',$data);
    }
}
