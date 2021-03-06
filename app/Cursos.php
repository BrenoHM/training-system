<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Conteudos;
use App\ConteudosRealizados;

class Cursos extends Model
{
    protected $table = "cursos";
    protected $primaryKey = 'idCurso';
    const     PERCENTUAL_CERTIFICADO = 100;

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

    public function avaliacoes()
    {
        return $this->hasMany('App\Avaliacoes', 'idCurso');
    }

    public function avaliacao()
    {
        return $this->hasMany('App\Avaliacoes', 'idCurso')
                    ->where('idUsuario', Auth::user()->id)->first();
    }

    public function rating()
    {
        $qtdAvaliacoes = $this->hasMany('App\Avaliacoes', 'idCurso')->count();
        return ($qtdAvaliacoes > 0) ? ($this->hasMany('App\Avaliacoes', 'idCurso')->sum('nota') / $qtdAvaliacoes) : 0;
    }

    public function inscrito()
    {
        return $this->hasMany('App\Inscricoes', 'idCurso')
                    ->where('idUsuario', Auth::user()->id);
    }

    public static function certificado($idCurso)
    {

        $qtdAulas = Conteudos::join('modulos', 'conteudos.idModulo', '=', 'modulos.idModulo')
                                ->where('modulos.idCurso', $idCurso)
                                ->whereIn('conteudos.tipoConteudo', ['video', 'anexo'])
                                ->count();

        $aulasVistas = ConteudosRealizados::join('conteudos', 'conteudos_realizados.idConteudo', '=', 'conteudos.idConteudo')
                                            ->join('modulos', 'conteudos.idModulo', '=', 'modulos.idModulo')
                                            ->join('cursos', 'modulos.idCurso', '=', 'cursos.idCurso')
                                            ->where('modulos.idCurso', $idCurso)
                                            ->whereIn('conteudos.tipoConteudo', ['video', 'anexo'])
                                            ->where('conteudos_realizados.idUsuario', Auth::user()->id)
                                            ->count();

        $porcentagemAssistidas = ( $aulasVistas / $qtdAulas ) * 100;

        return $porcentagemAssistidas == self::PERCENTUAL_CERTIFICADO ? true : false;

    }

    public function porcentagemAssistidas($idCurso, $idUsuario)
    {

        $qtdAulas = Conteudos::join('modulos', 'conteudos.idModulo', '=', 'modulos.idModulo')
                                ->where('modulos.idCurso', $idCurso)
                                ->whereIn('conteudos.tipoConteudo', ['video', 'anexo'])
                                ->count();

        $aulasVistas = ConteudosRealizados::join('conteudos', 'conteudos_realizados.idConteudo', '=', 'conteudos.idConteudo')
                                            ->join('modulos', 'conteudos.idModulo', '=', 'modulos.idModulo')
                                            ->join('cursos', 'modulos.idCurso', '=', 'cursos.idCurso')
                                            ->where('modulos.idCurso', $idCurso)
                                            ->whereIn('conteudos.tipoConteudo', ['video', 'anexo'])
                                            ->where('conteudos_realizados.idUsuario', $idUsuario)
                                            ->count();

        $porcentagemAssistidas = ( $aulasVistas / $qtdAulas ) * 100;
        
        return round($porcentagemAssistidas, 2);

    }
}
