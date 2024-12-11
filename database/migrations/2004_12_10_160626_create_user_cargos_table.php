<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCargosTable extends Migration
{
    public function up()
    {
        Schema::create('user_cargos', function (Blueprint $table) {
            $table->id(); // Chave primária (auto-increment)
            $table->unsignedBigInteger('user_cargo_id')->default();
            $table->string('cargo');
            $table->timestamps();
        
            // Chave estrangeira - não precisa de referência à tabela `users` aqui
            // O relacionamento é feito pela tabela `users` apontando para `user_cargos`
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('user_cargos');
    }
}
