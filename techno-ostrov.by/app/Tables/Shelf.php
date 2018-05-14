<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
   protected $table = 'shelves';
   protected $primaryKey = 'id_shelf';
   public $incrementing = true;
   public $timestamps = false;
}
