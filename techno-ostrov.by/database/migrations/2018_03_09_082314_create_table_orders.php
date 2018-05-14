<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id_order')->unsigned();            
            $table->datetime('date_order');
            $table->integer('id_shop')->unsigned();
            $table->integer('id_customer')->unsigned();
            $table->date('date_delivery');
            $table->string('status',8);

            $table->foreign('id_shop')->references('id_shop')->on('shops')->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('id_customer')->references('id_customer')->on('customers')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
