<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo');
            $table->foreign('tipo')->references('tipo')->on('tipo_transacoes')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('data', 8);
            $table->double('valor');
            $table->string('bi', 14);
            $table->string('cartao', 12);
            $table->string('hora', 6);
            $table->string('dono', 14);
            $table->unsignedBigInteger('loja');
            $table->foreign('loja')->references('id')->on('lojas')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('transacoes');
    }
}
