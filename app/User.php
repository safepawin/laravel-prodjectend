<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','firstname','lastname','phone_number','user_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'user_type_id' => 1,
    ];

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function store(){
        return $this->hasMany(Store::class);
    }
    public function user_type(){
        return $this->belongsTo(User_type::class);
    }
    public function bank()
    {
        return $this->hasMany(Bank::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
