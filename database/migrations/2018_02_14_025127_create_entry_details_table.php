<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_details', function (Blueprint $table) {
            $table->increments('identry_detail');

            $table->integer('identry')->unsigned();
            $table->integer('idarticle')->unsigned();
            $table->integer('quantity');
            $table->decimal('purchase_price', 11, 2);
            $table->decimal('sell_price', 11, 2);

            // Llaves foraneas
            $table->foreign('idarticle')->references('idarticle')->on('articles');
            $table->foreign('identry')->references('identry')->on('entries');

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
        Schema::dropIfExists('entry_details');
    }
}
