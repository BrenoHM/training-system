<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anotacoes extends Model
{
    protected $table = "anotacoes";
    protected $primaryKey = 'idAnotacao';

    protected $fillable = ['idConteudo', 'idUsuario', 'anotacao'];

    public function conteudo()
    {
    	return $this->belongsTo('App\Conteudos', 'idConteudo');
    }

    /*public function scopeInfo($query)
	{
	    return $query->with('conteudo', 'conteudo.modulo', 'conteudo.modulo.curso');
	}*/
}
