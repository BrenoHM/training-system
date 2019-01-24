<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tentativas extends Model
{
    protected $table = "tentativas";
    protected $primaryKey = 'idTentativa';
    protected $dates = ['finished_at'];

    protected $fillable = ['idAtividade', 'idUsuario', 'nota', 'finished_at'];

    public function atividade()
    {
    	return $this->belongsTo('App\Atividades', 'idAtividade');
    }
}
