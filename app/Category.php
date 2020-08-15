<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';
    use SoftDeletes;

    public function categoryChildrent(){
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function products(){
        return $this->hasMany('App\Product', 'category_id', 'id');
    }
}
