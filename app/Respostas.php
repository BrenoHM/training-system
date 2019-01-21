<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respostas extends Model
{
    protected $table = "respostas";
    protected $primaryKey = 'idResposta';

    protected $fillable = ['idTentativa', 'idAtividade', 'idPergunta', 'idAlternativa', 'idUsuario'];

    public function tentativa()
    {
    	return $this->belongsTo('App\Tentativas', 'idTentativa');
    }
}
