<?php

namespace App\Http\Controllers;

use App\Cursos;
use App\Categorias;
use App\Inscricoes;
use App\Conteudos;
use App\ConteudosRealizados;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CursosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['show', 'certificado', 'meusCursos']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cursos'] = Cursos::with('categoria')->get();
        return view('cursos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categorias'] = Categorias::all();
        return view('cursos.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'curso' => 'required',
            'instrutor' => 'required',
            'idCategoria' => 'required',
        ]);

        Cursos::create([
            'curso' => $request->curso,
            'idCategoria' => $request->idCategoria,
            'instrutor' => $request->instrutor,
            'palavrasChave' => $request->palavrasChave,
            'idUsuario' => $request->user()->id
        ]);

        return redirect()->route('cursos.index')
                        ->with('success', 'Curso criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show(Cursos $curso)
    {
        
        //$c = $curso->categoria()->orderBy('categoria')->get();
        $data['curso']    = $curso;
        $certificado      = false;
        $data['inscrito'] = (Inscricoes::where('idUsuario', Auth::user()->id)->where('idCurso', $curso->idCurso)->count()) > 0 ? true : false;

        if( $data['inscrito'] ){
            $certificado = Cursos::certificado($curso->idCurso);
        }

        $rating = 0;

        $qtdAvaliacoes  = $curso->avaliacoes()->count();

        if( $qtdAvaliacoes > 0 ){
            $somaAvaliacoes = $curso->avaliacoes()->sum('nota');
            $rating = $somaAvaliacoes / $qtdAvaliacoes;
        }

        $data['certificado'] = $certificado;

        $data['rating'] = $rating;

        return view('cursos.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit(Cursos $curso)
    {
        $data['curso'] = $curso;
        $data['categorias'] = Categorias::all();
        return view('cursos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cursos $curso)
    {

        $request->validate([
            'curso' => 'required',
            'instrutor' => 'required',
            'idCategoria' => 'required',
        ]);

        $curso->update([
            'curso' => $request->curso,
            'idCategoria' => $request->idCategoria,
            'instrutor' => $request->instrutor,
            'palavrasChave' => $request->palavrasChave,
            'idUsuario' => $request->user()->id
        ]);

        return redirect()->route('cursos.index')
                            ->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cursos $curso)
    {
        if( $curso->modulos->count() > 0 ){
            return redirect()->route('cursos.index')
                             ->with('warning', 'Existem módulos vinculados a este curso!');
        }

        if( $curso->inscricoes->count() > 0 ){
            return redirect()->route('cursos.index')
                             ->with('warning', 'Existem inscrições realizadas para este curso!');
        }

        $curso->delete();

        return redirect()->route('cursos.index')
                             ->with('success', 'Curso excluído com sucesso!');
    }

    public function certificado(Request $request)
    {

        $data['curso'] = Cursos::with('modulos')
                    ->with('modulos.conteudo')
                    ->where('idCurso', $request->idCurso)
                    ->first();

        //CHECA SE ESTA INSCRITO
        if($data['curso']->inscrito->count() == 0) {
            return redirect()->route('home')
                            ->with('info', 'Você não esta matriculado neste curso!');
        }

        //CASO NAO TENHA ATINGIDO OS 100%
        if( !Cursos::certificado($request->idCurso) ) {
            return redirect()->route('home')
                            ->with('info', 'Você não atingiu o percentual necessário para emissão do certificado!');
        }

        $data['nome'] = Auth::user()->name;
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $data['dataExtenso'] = ucwords(strftime('Belo Horizonte, %d de %B de %Y.', strtotime('today')));
        

        return \PDF::loadView('certificado.certificado', $data)
                    // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                    ->stream($data['nome'] . '.pdf');
    }

    public function meusCursos(Request $request)
    {
        $cursos = Cursos::with(['categoria', 'inscricoes', 'inscrito', 'avaliacoes'])
                        ->join('inscricoes', 'cursos.idCurso', '=', 'inscricoes.idCurso')
                        ->where('inscricoes.idUsuario', $request->user()->id)
                        ->get();

        $data['cursos'] = $cursos;
        return view('cursos.meus_cursos', $data);
    }
}
