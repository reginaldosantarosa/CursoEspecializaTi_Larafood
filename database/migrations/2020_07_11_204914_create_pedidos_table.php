<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{

    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('empresa_id');
            $table->string('identificacao')->unique();
            $table->integer('cliente_id')->nullable();
            $table->integer('mesa_id')->nullable();
            $table->double('total', 10, 2);
            $table->enum('status', ['aberto', 'pronto', 'rejeitado', 'produzindo', 'cancelado', 'entregando']);
          //  $table->enum('status', ['open', 'done', 'rejected', 'working', 'canceled', 'delivering']);
            $table->text('comentario')->nullable();
            $table->timestamps();

            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->onDelete('cascade');
        });

        Schema::create('pedido_produto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('produto_id');
            $table->integer('quantidade');
            $table->double('preco', 10, 2);

            $table->foreign('pedido_id')
                ->references('id')
                ->on('pedidos')
                ->onDelete('cascade');

            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('pedido_produto');
        Schema::dropIfExists('pedidos');
    }
}
