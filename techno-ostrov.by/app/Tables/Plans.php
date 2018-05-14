<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
   protected $table = 'plans';
   protected $primaryKey = 'id_plan';
   public $incrementing = true;
   public $timestamps = true;
}
