<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    protected $table = 'alugueis';
    
    protected $fillable = [
        'nome','locatario','data_aluguel','data_devolucao'
    ];

    public function getDataAluguelAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y'); // Formato brasileiro: DD/MM/AAAA
    }

    public function getDataDevolucaoAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}

