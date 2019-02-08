<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacoes extends Model
{
    protected $table = "avaliacoes";
    protected $primaryKey = 'idAvaliacao';
    const     LIMIT = 10; //LIMIT DE AVALIACOES A MOSTRAR NA TELA DE CURSOS

    protected $fillable = ['idCurso', 'idUsuario', 'nota', 'comentario'];

    public function usuario()
    {
    	return $this->belongsTo('App\User', 'idUsuario', 'id');
    }
}
