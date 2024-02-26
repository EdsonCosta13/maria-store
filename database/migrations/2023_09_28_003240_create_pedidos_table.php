<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('pedido_id');
            $table->string('referencia')->nullable();
            $table->date('data')->nullable();
            $table->time('hora')->nullable();
            $table->enum('metodo_pagamento',['cash','transferencia'])->nullable();
            $table->enum('estado',['Em Andamento','Entregue','Cancelado','Pendente'])->nullable();
            $table->decimal('total',10,2)->nullable();

            $table->unsignedBigInteger('usuario_id');  


            $table->softDeletes();
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
        Schema::dropIfExists('pedidos');
    }
}
