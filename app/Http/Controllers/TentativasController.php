<?php

namespace App\Http\Controllers;

use App\Tentativas;
use App\Atividades;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TentativasController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //VERIFICAR SE JA EXISTE UMA TENTATIVA PARA ESTA ATIVIDADE AINDA NAO TERMINADA
        $tentativa = Tentativas::where('idAtividade', $request->idAtividade)
                                ->where('idUsuario', $request->user()->id)
                                ->where('finished_at', null)
                                ->first();

        if( !$tentativa ) {
            //SE NAO TIVER UMA ATIVIDADE, CRIA OUTRA
            $tentativa = Tentativas::create([
                'idAtividade' => $request->idAtividade,
                'idUsuario'   => $request->user()->id,
                'nota'        => null
            ]);
        }

        return redirect()->route('atividades.show', $tentativa->idTentativa); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tentativas  $tentativas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $data['atividade'] = Atividades::find($request->tentativa);

        $tentativas = Tentativas::where('idAtividade', $request->tentativa)
                                ->where('idUsuario', $request->user()->id)
                                ->where('finished_at', '!=', null)
                                ->get();

        $data['tentativas'] = $tentativas;

        return view('tentativas.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tentativas  $tentativas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tentativas $tentativas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tentativas  $tentativas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //RESPOSTAS DAS TENTATIVAS
        $respTentativas = Respostas::where('idTentativa', $request->idTentativa)->get();
        $respT = [];

        //RESPOSTAS DA ATIVIDADE QUE FOI REALIZADA
        $respAtividade = Perguntas::with('alternativas')
                                    ->where('idAtividade', $request->idAtividade)
                                    ->get();
        $respA = [];

        if( count($respTentativas) ) {
            foreach ($respTentativas as $r) {
                $respT[$r->idPergunta] = $r->idAlternativa;
            }
        }

        if( count($respAtividade) ) {
            foreach ($respAtividade as $resp) {
                foreach ($resp->alternativas() as $r) {
                    if( $r->certa == 1 ){
                        $respA[$r->idPergunta] = $r->idAlternativa;
                    }
                }
            }
        }

        //CALCULO DA NOTA
        $nota = 0;
        foreach ($respT as $idPergunta => $resposta) {
            if( $respT[$idPergunta] == $respA[$idPergunta] ){
                $nota += 5;
            }
        }

        //ATUALIZA A NOTA E A DATA DE FINALIZAÇÃO NA TENTATIVA
        Tentativas::where('idTentativa' $request->idTentativa)->update([
            'nota' => $nota,
            'finished_at' => Carbon::now()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tentativas  $tentativas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tentativas $tentativas)
    {
        //
    }
}
