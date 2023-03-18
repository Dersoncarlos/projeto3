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
        // CEP, Endereço, Número, Complemento, Bairro, Cidade e Estado)
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->string("zipcode");
            $table->string("address");
            $table->string("number");
            $table->string("complement");
            $table->string("neighborhood");
            $table->string("city");
            $table->string("state");

            $table->unsignedBigInteger("patient_id");

            $table->foreign("patient_id")->references("id")->on("patients")->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
