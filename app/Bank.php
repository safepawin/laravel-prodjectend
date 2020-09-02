<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable  = ['bank_name','bank_number','bank_phone','store_id'];
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
