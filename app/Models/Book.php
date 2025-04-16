<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'author_id',
        'editor_id',
        'genero_id',
        'language_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class); 
    }

    public function editor()
    {
        return $this->belongsTo(Editor::class); 
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class); 
    }
    public function language()
    {
        return $this->belongsTo(language::class); 
    }
}
