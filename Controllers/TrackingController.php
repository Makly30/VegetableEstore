<?php

namespace App\Http\Controllers;

use App\Models\DeliverList;
use App\Models\Tracking;


use Illuminate\Http\Request;

class TrackingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);        
    }
 
   
}
