<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConteudosRealizados extends Model
{
    protected $table = "conteudos_realizados";
    protected $primaryKey = 'idConteudoRealizado';

    protected $fillable = ['idUsuario', 'idConteudo'];

}
