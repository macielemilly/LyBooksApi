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
  
    public function getDataAluguelFormatadaAttribute()
{
    return \Carbon\Carbon::parse($this->attributes['data_aluguel'])->format('d/m/Y');
}

public function getDataDevolucaoFormatadaAttribute()
{
    return \Carbon\Carbon::parse($this->attributes['data_devolucao'])->format('d/m/Y');
}
    
}

