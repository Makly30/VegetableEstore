<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverService extends Model
{
    use HasFactory;
    protected $table='deliver_service';
    protected $fillable=[
        'timefrom',
        'timeto',
        'duration',
        'image',
        'price',
    ];
    public function status_deliver(){
        return $this->belongsTo(StatusDeliver::class,'active','id');
    }
    public function drive(){
        return $this->belongsTo(User::class,'deliver','id');
    }
    public function province(){
        return $this->belongsTo(Province::class,'start','id');
    }
    public function provinces(){
        return $this->belongsTo(Province::class,'stop','id');
    }
    public function deliver_list(){
        return $this->hasMany(DeliverList::class);
    }
}
