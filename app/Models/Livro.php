<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';

    protected $fillable = [
        'titulo',
        'autor',
        'ano_publicacao',
        'genero',
        'quantidade_paginas',
        'status',
    ];

    protected $casts = [
        'ano_publicacao'     => 'integer',
        'quantidade_paginas' => 'integer',
    ];

    protected $attributes = [
        'status' => 'disponivel',
    ];
}