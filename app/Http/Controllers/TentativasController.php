<?php

namespace App\Http\Controllers;

use App\Tentativas;
use App\Atividades;
use Illuminate\Http\Request;

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
        //
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
    public function update(Request $request, Tentativas $tentativas)
    {
        //
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
