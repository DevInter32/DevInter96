<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVistasEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vistas_entradas', function (Blueprint $table) {

     $table->increments("id");

    
      $table->unsignedBigInteger("entrada_id");
      $table->foreign('entrada_id')->references('id')->on('entradas')->onDelete('cascade');
      $table->string("url");
      $table->string("session_id");
      $table->unsignedInteger('user_id')->nullable();//here note to make it nullable if your page is accessible publically as well not only by logged in users. Also its more appropriate to have "unsignedInteger" type instead of "string" type as mentioned in Jean Marcos' answer because user_id will save same data as id field of users table which in most cases will be an auto incremented id.
      $table->string("ip");
      $table->string("agent");
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
        Schema::table('vistas_entradas', function (Blueprint $table) {
            //
        });
    }
}
