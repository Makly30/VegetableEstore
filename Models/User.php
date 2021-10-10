<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fname',
        'lname',
        'phone',
        'image',
        'address',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function product(){
        return $this->hasMany(Product::class);
    }
    public function orderv(){
        return $this->hasMany(OrderV::class);
    }
    public function deliver_service(){
        return $this->hasMany(DeliverService::class);
    }
    public function deliver_list(){
        return $this->hasMany(DeliverList::class);
    }
}
