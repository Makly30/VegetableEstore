<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='product';
    protected $fillable=[
        'product_name',
        'product_price',
        'measure',
        'amount',
        'deliver_in',
        'deliver_out',
        'province_from',
        'available_time',
        'image',
        'timefrom',
        'timeto',
        'firstamount',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function owner(User $id){
        return $id->id===$this->user_id;
    }
    public function orderv(){
        return $this->hasMany(OrderV::class);
    }
    
}
