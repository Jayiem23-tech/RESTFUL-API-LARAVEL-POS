<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransheadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transheaders', function (Blueprint $table) {
            $table->id();
            $table->string('transno');
            $table->date('transdate');
            $table->integer('users_id');
            $table->integer('companies_id');
            $table->boolean('isCancel');
            $table->integer('items'); 

            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('companies_id')->references('id')->on('companies')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transheaders');
    }
}
