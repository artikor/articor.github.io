<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $table = 'orders';
   protected $primaryKey = 'id_order';
   public $incrementing = true;
   public $timestamps = false;
}
