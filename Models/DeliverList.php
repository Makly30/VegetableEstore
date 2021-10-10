<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverList extends Model
{
    use HasFactory;
    protected $table='deliver_list';
    protected $fillable=[
        'orp',
      
    ];
    public function sell(){
        return $this->belongsTo(User::class,'seller','id');
    }
    public function driver(){
        return $this->belongsTo(User::class,'deliver','id');
    }
    public function orderveget(){
        return $this->belongsTo(OrderV::class,'orp','id');
    }
    public function deliverservice(){
        return $this->belongsTo(DeliverService::class,'deliver_service','id');
    }
    public function tracking(){
        return $this->hasOne(Tracking::class);
    }
  
  
}
