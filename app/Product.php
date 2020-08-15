<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'products';
    use SoftDeletes;

    public function category(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function productImages(){
        return $this->hasMany('App\ProductImage', 'product_id', 'id');
    }
}
