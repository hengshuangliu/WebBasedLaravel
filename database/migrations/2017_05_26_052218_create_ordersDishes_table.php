<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordersDishes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('status', ['NotStart', 'Making','Finished']);
            $table->integer('order_id')->index();
            $table->integer('dish_id')->index();
            $table->integer('amount')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ordersDishes');
    }
}
