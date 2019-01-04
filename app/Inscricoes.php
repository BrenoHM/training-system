<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricoes extends Model
{
    protected $table = "inscricoes";
    protected $primaryKey = 'idInscricao';

    protected $fillable = ['idCurso', 'idUsuario'];

    public function curso()
    {
    	return $this->belongsTo('App\Cursos', 'idCurso');
    }
}
