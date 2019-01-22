<?php

namespace App\Http\Controllers;

use App\Respostas;
use Illuminate\Http\Request;

class RespostasController extends Controller
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

        $response = [
            'status'  => 1,
            'message' => '',
        ];

        //VERIFICAR SE JA EXISTE UMA RESPOSTA DESSA ATIVIDADE NESSA TENTATIVA
        $resposta = Respostas::where('idTentativa', $request->idTentativa)
                                ->where('idAtividade', $request->idAtividade)
                                ->where('idPergunta', $request->idPergunta)
                                ->first();

        if( !$resposta ) {
            Respostas::create([
                'idTentativa'   => $request->idTentativa,
                'idAtividade'   => $request->idAtividade,
                'idPergunta'    => $request->idPergunta,
                'idAlternativa' => $request->idAlternativa,
                'idUsuario'   => $request->user()->id
            ]);
        } else {
            Respostas::where('idTentativa', $request->idTentativa)
                        ->where('idAtividade', $request->idAtividade)
                        ->where('idPergunta', $request->idPergunta)
                        ->update(['idAlternativa' => $request->idAlternativa]);
        }

        return response()->json($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Respostas  $respostas
     * @return \Illuminate\Http\Response
     */
    public function show(Respostas $respostas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Respostas  $respostas
     * @return \Illuminate\Http\Response
     */
    public function edit(Respostas $respostas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Respostas  $respostas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Respostas $respostas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Respostas  $respostas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Respostas $respostas)
    {
        //
    }
}
