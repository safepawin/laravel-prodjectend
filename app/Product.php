<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function store(){
        return $this->belongsTo(Store::class);
    }
    public function product_image(){
        return $this->hasMany(Product_image::class);
    }
}
