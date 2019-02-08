<?php

namespace App\Http\Controllers;

use App\Avaliacoes;
use App\Cursos;
use Illuminate\Http\Request;

class AvaliacoesController extends Controller
{

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
    public function create(Request $request)
    {
        $data['idCurso'] = $request->idCurso;
        $data['rating'] = 0;
        $curso = Cursos::find($request->idCurso);

        if( $curso->inscrito->count() == 0 ){
            return redirect()->route('home')
                        ->with('info', 'Você não pode avaliar este curso pois não existe uma inscrição realizada!');
        }

        if( $curso->avaliacao() ){
            $data['rating'] = $curso->avaliacao()->nota;
        }else if( $curso->rating() > 0 ){
            $data['rating'] = $curso->rating();
        }
        
        return view('avaliacoes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $avaliacao = Avaliacoes::where('idCurso', $request->idCurso)
                               ->where('idUsuario', $request->user()->id)
                               ->first();
        if( $avaliacao ){
            $avaliacao->nota       = $request->rating;
            $avaliacao->comentario = $request->comentario;
            $avaliacao->save();
        }else{
            Avaliacoes::create([
                'idCurso'    => $request->idCurso,
                'idUsuario'  => $request->user()->id,
                'nota'       => $request->rating,
                'comentario' => $request->comentario,
            ]);
        }

        return redirect()->route('cursos.show', $request->idCurso)
                        ->with('success', 'Avaliação realizada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Avaliacoes  $avaliacoes
     * @return \Illuminate\Http\Response
     */
    public function show(Avaliacoes $avaliacoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Avaliacoes  $avaliacoes
     * @return \Illuminate\Http\Response
     */
    public function edit(Avaliacoes $avaliacoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Avaliacoes  $avaliacoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avaliacoes $avaliacoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Avaliacoes  $avaliacoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avaliacoes $avaliacoes)
    {
        //
    }

    public function assessmentsDemanda(Request $request)
    {

        $limit = Avaliacoes::LIMIT;

        $avaliacoes = Avaliacoes::with('usuario')
                                ->where('idCurso', $request->idCurso)
                                ->skip($request->page * $limit)
                                ->take($limit)
                                ->get();

        return response()->json([
            'avaliacoes' => $avaliacoes,
            'page' => $request->page + 1
        ]);

    }
}
