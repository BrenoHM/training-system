<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anotacoes extends Model
{
    protected $table = "anotacoes";
    protected $primaryKey = 'idAnotacao';

    protected $fillable = ['idConteudo', 'idUsuario', 'anotacao'];
}
