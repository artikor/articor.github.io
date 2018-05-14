<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
   protected $table = 'basket';
   protected $primaryKey = 'id_basket';
   public $incrementing = true;
   public $timestamps = false;
}
