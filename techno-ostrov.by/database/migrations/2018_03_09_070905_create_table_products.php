<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id_prod')->unsigned();
            $table->string('name',255);
            $table->string('path_img',200);
            $table->string('department',200);
            $table->integer('id_cat')->unsigned();
            $table->decimal('price',10,2)->unsigned();
            $table->integer('guarantee')->unsigned();
            $table->string('description');
            $table->string('country',150);
            $table->double('weight',10,2);
            $table->string('size',200);
            $table->timestamps();
            $table->foreign('id_cat')->references('id_cat')->on('categories')->onDelete('restrict')->onUpdate('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
