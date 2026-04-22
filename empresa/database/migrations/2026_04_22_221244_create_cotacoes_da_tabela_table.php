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
        Schema::create('cotacoes_da_tabela', function (Blueprint $table) {
            $table->id();
            $table->string('moeda');
            $table->decimal('preco', 10, 4);
            $table->String('variacao');
            $table->date('data_consulta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotacoes_da_tabela');
    }
};
