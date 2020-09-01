<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public function store()
    {
        return $this->belongsTo(User::class);
    }
}
