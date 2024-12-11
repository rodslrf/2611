<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CpfVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpf_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cpf_verification_id')->default(0);
            $table->string('cpf')->unique()->default('000.000.000-00');
            $table->timestamp('cpf_verified_at')->nullable();
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
        Schema::dropIfExists('cpf_verification');
    }
}
