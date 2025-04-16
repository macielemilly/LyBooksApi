<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable = [
        'nome',
    ];

    public function books()
    {
        return $this->hasMany(Book::class); 
    }
}
