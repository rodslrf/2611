<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPhonesTable extends Migration
{
    public function up()
{
    Schema::create('user_phones', function (Blueprint $table) {
        $table->id(); // Chave primária
        $table->unsignedBigInteger('user_phone_id')->default();
        $table->string('email')->unique();
        $table->string('telefone')->default('(XX) XXXX-XXXX')->nullable();
        $table->timestamps();

        // Definindo a chave estrangeira corretamente
    });
}

public function down()
{
    Schema::dropIfExists('user_phones');
}
}
