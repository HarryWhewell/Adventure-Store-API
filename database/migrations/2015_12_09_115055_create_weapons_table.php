<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeaponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wepons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref');
            $table->string('type');
            $table->string('name');
            $table->string('desc');
            $table->string('damage');
            $table->integer('price')->length(10);
            $table->integer('quantity')->length(10);
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
        Schema::drop('wepons');
    }
}
