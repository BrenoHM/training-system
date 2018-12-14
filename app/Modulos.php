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
}
