<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
  protected $fillable = ['product_id','name','quantity','price','cur_price','discount','user_id'];
}
