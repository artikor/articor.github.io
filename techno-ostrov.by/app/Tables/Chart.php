<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
   protected $table = 'chart';
   protected $primaryKey = 'id_chart';
   public $incrementing = true;
   public $timestamps = false;
}
