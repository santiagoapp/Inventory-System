<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('identry');

            $table->integer('idsupplier')->unsigned();
            $table->integer('iduser')->unsigned();
            $table->string('tipo_comprobante', 20);
            $table->string('serie_comprobante', 7);
            $table->string('num_comprobante', 10);
            $table->decimal('impuesto', 4, 2);
            $table->decimal('total_compra', 11, 2);
            $table->string('estado', 20);

            // llaves foraneas
            $table->foreign('iduser')->references('id')->on('users');
            $table->foreign('idsupplier')->references('idperson')->on('people');

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
        Schema::dropIfExists('entries');
    }
}
