<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name','product_detail','product_price','product_quantity','store_id','category_id','product_status'];

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
