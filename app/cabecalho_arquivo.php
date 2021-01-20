<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cabecalho_arquivo extends Model
{
    protected $table = 'cabecalho_arquivo';

    protected $fillable = [
        'cabecalho_nome', 
    ];
}
