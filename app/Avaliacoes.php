<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacoes extends Model
{
    protected $table = "avaliacoes";
    protected $primaryKey = 'idAvaliacao';

    protected $fillable = ['idCurso', 'idUsuario', 'nota'];

    public function usuario()
    {
    	return $this->belongsTo('App\User', 'idUsuario', 'id');
    }
}
