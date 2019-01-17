<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tentativas extends Model
{
    protected $table = "tentativas";
    protected $primaryKey = 'idTentativa';

    protected $fillable = ['idAtividade', 'idUsuario', 'nota'];
}
