<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinho_items', function (Blueprint $table) {  
            $table->increments('carrinho_item_id');
            $table->integer('quantidade')->nullable();
            $table->decimal("preco_unitario")->nullable();

            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('carrinho_id');

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
        Schema::dropIfExists('carrinho_items');
    }
}
