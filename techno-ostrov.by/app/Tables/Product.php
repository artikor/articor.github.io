<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table = 'products';
   protected $primaryKey = 'id_prod';
   public $incrementing = true;
   public $timestamps = true;
}
