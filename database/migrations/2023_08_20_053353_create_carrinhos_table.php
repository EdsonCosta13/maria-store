<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */  
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->increments('carrinho_id');
            $table->decimal('total',10,2)->nullable();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->enum('status',['Activo','Cancelado','Fechado']);

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
        Schema::dropIfExists('carrinhos');
    }
}
