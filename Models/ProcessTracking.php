<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessTracking extends Model
{
    use HasFactory;
    protected $table='status_tracking';
    protected $fillable=[
        'process_name',
    ];
    public function tracking(){
        return $this->hasMany(Tracking::class);
    }
}
