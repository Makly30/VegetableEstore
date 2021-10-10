<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverChoice extends Model
{
    use HasFactory;
    protected $table='deliver_choice';
    protected $fillable=[
        'deliver_choice_name',
    ];
    public function orderv(){
        return $this->hasMany(OrderV::class);
    }
}
