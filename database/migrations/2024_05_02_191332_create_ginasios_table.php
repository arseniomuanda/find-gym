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
        Schema::create('ginasios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('telefone', 9);
            $table->string('email', 150);
            $table->string('empresa', 100);
            $table->string('endereco', 200);

            $table->text('sobre')->nullable();

            $table->string('imagem', 255);

            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();

            $table->string('segunda', 19)->nullable();
            $table->string('terca', 19)->nullable();
            $table->string('quarta', 19)->nullable();
            $table->string('quinta', 19)->nullable();
            $table->string('sexta', 19)->nullable();
            $table->string('sabado', 19)->nullable();
            $table->string('domingo', 19)->nullable();

            $table->unsignedBigInteger('categoria');
            $table->foreign('categoria')->references('id')->on('categorias');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ginasios');
    }
};
