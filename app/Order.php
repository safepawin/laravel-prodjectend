<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_total','order_status','user_id','bill_image','address_id','billcode'];

    public function order_detail()
    {
        return $this->hasMany(Order_detail::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
