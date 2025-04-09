<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    protected $table = 'alugueis';
    
    protected $fillable = [
        'nome','locatario','data_aluguel','data_devolucao'
    ];
}

