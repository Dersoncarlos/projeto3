<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        //         Foto do Paciente;
        // Nome Completo do Paciente;
        // Nome Completo da Mãe;
        // Data de Nascimento;
        // CPF;
        // SNC;
        // Endereço completo, (CEP, Endereço, Número, Complemento, Bairro, Cidade e Estado)*;
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string("photo")->nullable();
            $table->string("full_name");
            $table->string("mother_full_name");
            $table->string("birthday");
            $table->integer("cpf");
            $table->string("snc")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
