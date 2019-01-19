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

    public function perguntas()
    {
    	return $this->hasMany('App\Perguntas', 'idAtividade');
    }

    public static function getAtividade($idAtividade)
    {
        return Atividades::with(['perguntas', 'perguntas.alternativas'])->where('idAtividade', $idAtividade)->first();
    }
}
