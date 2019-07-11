<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcommerceurbanshippingMapareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icommerceurbanshipping__mapareas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('polygon');
            $table->string('name')->default("");
            $table->double('price', 30, 2)->default(0);
            $table->integer('minimum')->default(0);

            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('icommerce__stores')->onDelete('restrict');
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
        Schema::dropIfExists('icommerceurbanshipping__mapareas');
    }
}
