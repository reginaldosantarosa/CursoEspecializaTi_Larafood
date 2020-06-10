<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilPlanoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_plano', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plano_id');
            $table->unsignedBigInteger('perfil_id');

            $table->foreign('plano_id')
                ->references('id')
                ->on('planos')
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
        Schema::dropIfExists('perfil_plano');
    }
}
