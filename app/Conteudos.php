<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Conteudos extends Model
{
    protected $table = "conteudos";
    protected $primaryKey = 'idConteudo';

    protected $fillable = ['conteudo', 'tipoConteudo', 'idModulo', 'ordem', 'url', 'idUsuario'];

    public function modulo()
    {
    	return $this->belongsTo('App\Modulos', 'idModulo');
    }

    public function realizado()
    {
        return $this->hasMany('App\ConteudosRealizados', 'idConteudo')->where('idUsuario', Auth::user()->id);
    }
    
}
