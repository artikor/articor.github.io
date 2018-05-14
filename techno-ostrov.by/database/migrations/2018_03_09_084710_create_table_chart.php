<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart', function (Blueprint $table) {
            $table->increments('id_chart')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->date('period');

            for($i=1; $i<=31; $i++){
                $table->string("day_$i",255)->collation("utf8_general_ci");
            }

            $table->foreign('id_user')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chart');
    }
}
