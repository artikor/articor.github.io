<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
   protected $table = 'bonuses';
   protected $primaryKey = 'id_algorithm';
   public $incrementing = true;
   public $timestamps = false;
}
