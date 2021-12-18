<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoTransacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_transacoes', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo')->unique();
            $table->string('descricao');
            $table->enum('natureza', ['Entrada', 'Saida']);
            $table->enum('sinal', ['+', '-']);
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
        Schema::dropIfExists('tipo_transacoes');
    }
}
