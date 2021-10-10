<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;
    protected $table='tracking';
    protected $fillable=[
        'tr_place',
    ];
    public function orp(){
        return $this->hasOne(OrderV::class);
    }
    public function processtracking(){
        return $this->belongsTo(ProcessTracking::class,'process_status','id');
    }
    public function deliverlist(){
        return $this->belongsTo(DeliverList::class,'deliver_list','id');
    }
}
