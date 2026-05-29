<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    // Define os campos que podem ser preenchidos em massa.
    protected $fillable = ['titulo', 'autor', 'ano_publicacao'];
}
