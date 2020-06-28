<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plano_id');
            $table->uuid('uuid');
            $table->string('cnpj')->unique();
            $table->string('nome')->unique();
            $table->string('url')->unique();
            $table->string('email')->unique();
            $table->string('logo')->nullable();

            // Status tenant (se inativar 'N' ele perde o acesso ao sistema)
            $table->enum('ativo', ['S', 'N'])->default('S');

            // Subscription
                //$table->date('subscription')->nullable(); // Data que se inscreveu
            $table->date('inscricao')->nullable(); // Data que se inscreveu
//
//          $table->date('expires_at')->nullable(); // Data que expira o acesso
            $table->date('expira_acesso')->nullable(); // Data que expira o acesso

            //$table->string('subscription_id', 255)->nullable(); // Identificado do Gateway de pagamento
            $table->string('inscricao_id', 255)->nullable(); // Identificado do Gateway de pagamento

            //$table->boolean('subscription_active')->default(false); // Assinatura ativa (porque pode cancelar)
            $table->boolean('inscricao_ativa')->default(false); // Assinatura ativa (porque pode cancelar)

            //table->boolean('subscription_suspended')->default(false); // Assinatura cancelada
            $table->boolean('inscricao_suspensa')->default(false); // Assinatura cancelada
            $table->timestamps();

            $table->foreign('plano_id')->references('id')->on('planos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
