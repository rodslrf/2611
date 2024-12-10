<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCargosTable extends Migration
{
    public function up()
    {
        Schema::create('user_cargos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('cpf')->unique()->default('00000000000');
            $table->string('cargo');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Chave estrangeira
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('user_cargos');
    }
}
