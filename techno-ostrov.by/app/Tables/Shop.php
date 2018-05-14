<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
   protected $table = 'shops';
   protected $primaryKey = 'id_shop';
   public $incrementing = true;
   public $timestamps = false;
}
