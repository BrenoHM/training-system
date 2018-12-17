<?php

namespace App\Http\Controllers;

use App\Cursos;
use App\Categorias;
use App\Inscricoes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CursosController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cursos'] = Cursos::all();
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
        $data['curso'] = $curso;
        $data['inscrito'] = (Inscricoes::where('idUsuario', Auth::user()->id)->where('idCurso', $curso->idCurso)->count()) > 0 ? true : false;
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
    public function destroy(Cursos $cursos)
    {
        //
    }
}
