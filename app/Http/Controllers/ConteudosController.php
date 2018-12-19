<?php

namespace App\Http\Controllers;

use App\Conteudos;
use Illuminate\Http\Request;

class ConteudosController extends Controller
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
        $data['conteudos'] = Conteudos::with('modulo')->get();
        return view('conteudos.index', $data);
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
     * @param  \App\Conteudos  $conteudos
     * @return \Illuminate\Http\Response
     */
    public function show(Conteudos $conteudos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conteudos  $conteudos
     * @return \Illuminate\Http\Response
     */
    public function edit(Conteudos $conteudos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conteudos  $conteudos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conteudos $conteudos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conteudos  $conteudos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conteudos $conteudos)
    {
        //
    }
}
