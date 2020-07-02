<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    protected $fillable = ['type_name'];

    protected $attributes = [
        'id' => 1,
        'type_name'=> 'member'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
