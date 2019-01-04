<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    protected $table = "modulos";
    protected $primaryKey = 'idModulo';

    protected $fillable = ['modulo', 'idCurso', 'idUsuario', 'ordem'];

    public function curso()
    {
    	return $this->belongsTo('App\Cursos', 'idCurso');
    }

    public function conteudo()
    {
    	return $this->hasMany('App\Conteudos', 'idModulo')
                        ->orderBy('ordem')
                        ->orderBy('conteudo');
    }

    public function atividade()
    {
        return $this->hasMany('App\Atividades', 'idModulo');
    }
}
