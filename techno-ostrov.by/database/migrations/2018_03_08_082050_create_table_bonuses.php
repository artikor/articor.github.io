<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBonuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonuses', function (Blueprint $table) {
            $table->increments('id_algorithm');
            $table->string('name',100);
            $table->decimal('min_budget',10,2);
            $table->decimal('plan_budget',10,2);
            $table->decimal('max_budget',10,2); 
            $table->double('min_percent',10,2);
            $table->double('plan_percent',10,2);
            $table->double('max_percent',10,2);
            $table->boolean('limit');
            $table->double('ratio_a');
            $table->double('ratio_b');
            $table->double('ratio_c');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bonuses');
    }
}
