<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('idarticle');

            $table->integer('idcategory')->unsigned();
            $table->string('code', 200);
            $table->string('name', 200);
            $table->string('stock', 200);
            $table->string('image', 200);
            $table->text('description');
            $table->boolean('condition');
            $table->timestamps();

            // Llaves foraneas
            $table->foreign('idcategory')->references('idcategory')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
