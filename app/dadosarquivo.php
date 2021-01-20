<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dadosarquivo extends Model
{
    protected $table = 'dadosarquivo';

    protected $fillable = [
        'CodigodoProduto', 'EAN', 'Descricao', 'Fornecedor','valor_1 ','valor_2 ','valor_3 ','valor_4 ','valor_5 ','valor_6 ','valor_7 ','valor_8 ','valor_9 ','valor_10','valor_11','valor_12','valor_13','valor_14','valor_15','valor_16','valor_17','valor_18','valor_19','valor_20','valor_21','valor_22','valor_23','valor_24','regiao','dt_arquivo',
    ];
}
