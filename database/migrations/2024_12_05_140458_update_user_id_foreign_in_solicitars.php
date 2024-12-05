<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserIdForeignInSolicitars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('solicitars', function (Blueprint $table) {
        $table->dropForeign(['user_id']); // Remove a antiga restrição de chave estrangeira
        $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('set null'); // Permite que user_id seja nulo
    });
}

public function down()
{
    Schema::table('solicitars', function (Blueprint $table) {
        $table->dropForeign(['user_id']); // Remove a nova restrição de chave estrangeira
        $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('restrict'); // Restaura a regra original
    });
}
}
