<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = 'categories';
   protected $primaryKey = 'id_cat';
   public $incrementing = true;
   public $timestamps = false;
}
