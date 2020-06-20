<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    protected $fillable = ['type_name'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
