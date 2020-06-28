<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('description');
            $table->decimal('price',15,2);
            $table->integer('users_id')->unsigned(); 
            $table->integer('categories_id')->unsigned(); 
            
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
