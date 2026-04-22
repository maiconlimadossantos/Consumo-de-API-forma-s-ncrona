<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotacao extends Model
{
    protected $table = 'cotacoes_da_tabela';

    protected $fillable = [
        'moeda',
        'preco',
        'variacao',
        'data_consulta',
    ];
}
