<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternativas extends Model
{
    protected $table = "alternativas";
    protected $primaryKey = 'idAlternativa';

    protected $fillable = ['alternativa', 'idPergunta', 'certa'];
}
