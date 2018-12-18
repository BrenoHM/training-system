<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = "categorias";
    protected $primaryKey = 'idCategoria';

    protected $fillable = ['categoria', 'idUsuario'];

    public function cursos()
    {
        return $this->hasMany('App\Cursos', 'idCategoria');
    }
}
