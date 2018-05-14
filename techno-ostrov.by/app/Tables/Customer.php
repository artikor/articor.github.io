<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $table = 'customers';
   protected $primaryKey = 'id_customer';
   public $incrementing = true;
   public $timestamps = false;
}
