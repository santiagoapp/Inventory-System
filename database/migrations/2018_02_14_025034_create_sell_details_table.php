<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idsell')->unsigned();
            $table->integer('idarticle')->unsigned();
            $table->integer('quantity');
            $table->decimal('sell_price', 11, 2);
            $table->decimal('discount', 11, 2);

            // Llaves foraneas
            $table->foreign('idarticle')->references('idarticle')->on('articles');
            $table->foreign('idsell')->references('idsell')->on('sells');

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
        Schema::dropIfExists('sell_details');
    }
}
