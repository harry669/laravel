<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

      protected $fillable = [
        'product_name', 'category_id',
    ];


      public function image()
      {
      	 return $this->hasMany('App\Image','product_id');
      }
}
