<?php

namespace App\Http\Controllers;

use App\Inscricoes;
use Illuminate\Http\Request;

class InscricoesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        ]);

        Inscricoes::create([
            'idCurso' => $request->curso,
            'idUsuario' => $request->user()->id
        ]);

        return redirect()->route('cursos.show', $request->curso);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inscricoes  $inscricoes
     * @return \Illuminate\Http\Response
     */
    public function show(Inscricoes $inscricoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inscricoes  $inscricoes
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscricoes $inscricoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inscricoes  $inscricoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscricoes $inscricoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inscricoes  $inscricoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscricoes $inscricoes)
    {
        //
    }

    public function subscribed(Request $request)
    {
        $inscricoes = Inscricoes::with('curso')->where('idUsuario', $request->user()->id)->take(4)->get();
        
        return response()->json($inscricoes);
    }
}
