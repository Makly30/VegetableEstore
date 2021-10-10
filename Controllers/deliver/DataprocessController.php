<?php

namespace App\Http\Controllers\deliver;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataprocessController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(User $id){
      $order=app('db')->select("select sum(deliver_service.price) as total, MONTH(deliver_list.created_at)month_total from deliver_list JOIN deliver_service on deliver_list.deliver_service=deliver_service.id join users on deliver_list.deliver=users.id where users.id=".$id->id." group by month_total ;");
        $data = [];
        
     
        foreach($order as $row){
            $data['label'][] = $row->month_total;
            $data['data'][] = (float)$row->total;
        }
        $data['chart_data'] = json_encode($data);
        return view('deliver.mydataprocess',$data);
    }

}
