<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tables\Bonus;

class Data extends Model
{
   public static function InsertIntoBonus(){
   	$bonus = new Bonus;
      $bonus->name = "Стандарт";
      $bonus->min_budget = 0;
      $bonus->plan_budget = 5000;
      $bonus->max_budget = 8000;
      $bonus->min_percent = 0;
      $bonus->plan_percent = 100;
      $bonus->max_percent = 100;
      $bonus->budget_limit = 1;
      $bonus->ratio_a = 1;
      $bonus->ratio_b = 1;
      $bonus->ratio_c = 1;
      $bonus->save();
   }
}
