<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table='province';
    protected $fillable=[
        'PROVINCE_NAME',
      
    ];
    public function deliver_service(){
        return $this->hasMany(DeliverService::class);
    }
}
