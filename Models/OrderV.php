<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderV extends Model
{
    use HasFactory;
    protected $table='order_vegetable';
    protected $fillable=[
        'orp_amount',
        
        
    ];
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function usercustomer(){
        return $this->belongsTo(User::class,'customer_id','id');
    }
    public function deliver_choice(){
        return $this->belongsTo(DeliverChoice::class,'deliver_choice_id','id');
    }
    public function deliver_list(){
        return $this->hasOne(DeliverList::class);
    }
    public function trackingcode(){
        return $this->belongsTo(Tracking::class,'tracking','id');
    }
    public function hastracking(DeliverList $delil){
        return $this->trackingcode->contains('deliver_list',$delil->id);
    }
   
}
