<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Model;

class Binding extends Model
{
   protected $table = 'binding';
   protected $primaryKey = 'id_bind';
   public $incrementing = true;
   public $timestamps = false;
}
