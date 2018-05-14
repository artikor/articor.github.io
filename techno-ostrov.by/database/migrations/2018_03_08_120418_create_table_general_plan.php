<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGeneralPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_plan', function (Blueprint $table) {
            $table->increments('id_plan');
            $table->integer('id_shop')->unsigned();
            $table->date('period');
            $table->decimal('plan',10,2);
            $table->foreign('id_shop')->references('id_shop')->on('shops')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('general_plan');
    }
}
