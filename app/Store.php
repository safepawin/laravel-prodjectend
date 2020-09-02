<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable  = ['store_name','store_detail','user_id','start_store_at','store_image'];

    public function product(){
        return $this->hasMany(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_detail()
    {
        return $this->hasMany(Order_detail::class);
    }

    public function bank()
    {
        return $this->hasOne(Bank::class);
    }
    protected $attributes = [
        'store_image'=> 'default/store.jpg'
    ];
}
