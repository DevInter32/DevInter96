<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Se coloca de primero para que no haya errores en crear la tabla de usuarios
        /*Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('Nombre del rol de usuario');
            $table->text('description');
            $table->timestamps();
        });*/


        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->unsignedInteger('rol_id')->default(2);
            //$table->foreign('rol_id')->references('id')->on('roles');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('imagen_perfil')->nullable()->default("noimagen.jpg");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');

    }
}
