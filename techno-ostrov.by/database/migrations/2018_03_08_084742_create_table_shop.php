<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->increments('id_shop');
            $table->string('name');
            $table->string('director');
            $table->string('phone');
            $table->string('type_shop'); 
            $table->integer('id_algorithm')->unsigned();
            $table->foreign('id_algorithm')->references('id_algorithm')->on('bonuses')->onDelete('restrict')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shop');
    }
}
