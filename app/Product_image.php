<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }

    protected $fillable = ['product_image_name','product_image','product_id'];
}
