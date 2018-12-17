<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conteudos extends Model
{
    protected $table = "conteudos";
    protected $primaryKey = 'idConteudo';

    protected $fillable = ['conteudo', 'tipoConteudo', 'idModulo', 'idUsuario'];
}
