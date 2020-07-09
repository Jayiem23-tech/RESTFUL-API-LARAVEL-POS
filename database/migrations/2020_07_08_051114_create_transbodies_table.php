<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransbodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transbodies', function (Blueprint $table) {
            $table->id();
            $table->integer('transheader_id')->unsigned();
            $table->integer('products_id')->unsigned();
            $table->decimal('price',15,2);
            $table->integer('quantity');
            $table->decimal('subtotal'); 
            $table->boolean('isVoid');

            $table->foreign('transheader_id')->references('id')->on('transheaders')->onUpdate('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onUpdate('cascade');



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
        Schema::dropIfExists('transbodies');
    }
}
