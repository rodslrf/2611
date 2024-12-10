<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPhonesTable extends Migration
{
    public function up()
    {
        Schema::create('user_phones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relaciona ao ID do usuário
            $table->string('email')->unique();
            $table->string('telefone')->default('Não informado');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Chave estrangeira
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_phones');
    }
}
