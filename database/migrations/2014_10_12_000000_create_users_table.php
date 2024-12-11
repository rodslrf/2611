<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Chave primária
            
            // Chaves estrangeiras
            $table->unsignedBigInteger('user_cargo_id')->default(1);
            $table->foreign('user_cargo_id')->references('id')->on('user_cargos')->onDelete('cascade');
            
            $table->unsignedBigInteger('phone_id')->default(1);
            $table->foreign('phone_id')->references('id')->on('user_phones')->onDelete('cascade');
            
            $table->unsignedBigInteger('cpf_verification_id')->default(1);
            $table->foreign('cpf_verification_id')->references('id')->on('cpf_verifications')->onDelete('cascade');
            
            $table->unsignedBigInteger('auth_token_id')->default(1);
            $table->foreign('auth_token_id')->references('id')->on('auth_tokens')->onDelete('cascade');
            
            // Dados do usuário
            $table->string('name');
            $table->string('status')->default('Ativo');
            $table->timestamps();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
