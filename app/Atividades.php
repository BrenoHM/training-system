<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividades extends Model
{
    protected $table = "atividades";
    protected $primaryKey = 'idAtividade';

    protected $fillable = ['atividade', 'idModulo', 'idUsuario'];

    public function modulo()
    {
    	return $this->belongsTo('App\Modulos', 'idModulo');
    }
}
