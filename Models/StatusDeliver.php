<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusDeliver extends Model
{
    use HasFactory;
    protected $table='status_deliver';
    protected $fillable=['status_name'];
    public function deliver_service(){
        return $this->hasMany(DeliverService::class);
    }
}
