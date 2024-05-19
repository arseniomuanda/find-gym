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
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->id();
            $table->string('bi', 14);
            $table->string('nome', 30);
            $table->string('telefone', 9);
            $table->string('email', 150);
            $table->string('provincia', 30);
            $table->string('nacionalidade', 30);
            $table->string('residencia', 30);
            $table->char('sexo', 1);
            $table->string('estado_civil', 9);
            $table->string('foto', 255)->nullable();
            $table->string('anexo', 255)->nullable();
            $table->boolean('is_aprovado')->default(false);
            $table->date('data_nascimento')->nullable();
            $table->double('peso')->nullable();


            $table->unsignedBigInteger('ginasio');
            $table->foreign('ginasio')->references('id')->on('ginasios');

            $table->unsignedBigInteger('utilizador');
            $table->foreign('utilizador')->references('id')->on('users');

            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricaos');
    }
};
