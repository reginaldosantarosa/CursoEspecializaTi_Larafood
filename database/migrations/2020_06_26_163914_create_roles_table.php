<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->unique();
            $table->string('descricao')->nullable();
            $table->timestamps();
        });

        /**
         * Pivo table: permissoes x roles
         */

        Schema::create('permissao_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('permissao_id');
            $table->unsignedBigInteger('role_id');

            $table->foreign('permissao_id')
                ->references('id')
                ->on('permissaos')
                ->onDelete('cascade');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
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
        Schema::dropIfExists('permissao_role');
        Schema::dropIfExists('roles');
    }
}
