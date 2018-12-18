<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cursos extends Model
{
    protected $table = "cursos";
    protected $primaryKey = 'idCurso';

    protected $fillable = ['curso', 'instrutor', 'idCategoria', 'palavrasChave', 'idUsuario'];

    public function categoria()
    {
    	return $this->belongsTo('App\Categorias', 'idCategoria');
    }

    public function modulos()
    {
    	return $this->hasMany('App\Modulos', 'idCurso')
                        ->orderBy('ordem')
                        ->orderBy('modulo');
    }

    public function inscricoes()
    {
        return $this->hasMany('App\Inscricoes', 'idCurso');
    }

    public function inscrito()
    {
        return $this->hasMany('App\Inscricoes', 'idCurso')
                    ->where('idUsuario', Auth::user()->id);
    }
}
