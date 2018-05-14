<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBasket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket', function (Blueprint $table) {
            $table->increments('id_basket')->unsigned();
            $table->integer('id_order')->unsigned();
            $table->integer('id_prod')->unsigned();
            $table->integer('count')->unsigned();

            $table->foreign('id_order')->references('id_order')->on('orders')->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('id_prod')->references('id_prod')->on('products')->onDelete('restrict')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('basket');
    }
}
