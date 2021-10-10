<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\OrderV;
use App\Models\User;
use Illuminate\Support\Facades\DB;


use Carbon\Carbon;
use Illuminate\Http\Request;

class MyDataProcessController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index( User $id){
      $order=app('db')->select("select sum(CASE WHEN order_vegetable.deliver_choice_id=1 THEN round((product.product_price*order_vegetable.orp_amount)/ product.measure+product.deliver_in,2) ELSE round((product.product_price*order_vegetable.orp_amount)/ product.measure+product.deliver_out,2)END) as total, MONTH(order_vegetable.created_at)month_total from order_vegetable JOIN product on order_vegetable.product_id=product.id join users on order_vegetable.customer_id=users.id where order_vegetable.customer_id=".$id->id." group by month_total ;");
        $data = [];
        
     
        foreach($order as $row){
            $data['label'][] = $row->month_total;
            $data['data'][] = (float)$row->total;
        }
        $data['chart_data'] = json_encode($data);
        return view('customer.mydataprocess',$data);
    }
     
    
}
