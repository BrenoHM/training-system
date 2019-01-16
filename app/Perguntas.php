<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perguntas extends Model
{
    protected $table = "perguntas";
    protected $primaryKey = 'idPergunta';

    protected $fillable = ['pergunta', 'idAtividade', 'idUsuario'];

    public function alternativas()
    {
    	return $this->hasMany('App\Alternativas', 'idPergunta');
    }
}
