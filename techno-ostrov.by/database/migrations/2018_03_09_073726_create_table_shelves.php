<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShelves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelves', function (Blueprint $table) {
            $table->increments('id_shelf')->unsigned();
            $table->integer('id_shop')->unsigned();
            $table->integer('id_prod')->unsigned();
            $table->integer('count')->unsigned();

            $table->foreign('id_shop')->references('id_shop')->on('shops')->onDelete('restrict')->onUpdate('cascade');

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
        Schema::drop('shelves');
    }
}
