<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilPermissaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_permissao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('permissao_id');
            $table->unsignedBigInteger('perfil_id');

            $table->foreign('permissao_id')
                ->references('id')
                ->on('permissaos')
                ->onDelete('cascade');
            $table->foreign('perfil_id')
                ->references('id')
                ->on('perfils')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfil_permissao');
    }
}
