<?php

namespace App\Http\Controllers;

use App\Modulos;
use App\Cursos;
use Illuminate\Http\Request;

class ModulosController extends Controller
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
        $data['modulos'] = Modulos::with('curso')->get();
        return view('modulos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cursos'] = Cursos::all();
        return view('modulos.create', $data);
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
            'status' => 1,
            'message' => '',
        ];

        $request->validate([
            'modulo' => 'required',
            'idCurso' => 'required',
            'ordem' => 'required',
        ]);

        Modulos::create([
            'modulo' => $request->modulo,
            'idCurso' => $request->idCurso,
            'ordem' => $request->ordem,
            'idUsuario' => $request->user()->id
        ]);

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulos  $modulos
     * @return \Illuminate\Http\Response
     */
    public function show(Modulos $modulos)
    {
        //return response()->json(['idCurso'=> $request->modulo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulos  $modulos
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $modulo = Modulos::find($request->modulo);
        return view('modulos.edit', $modulo);

    }

    public function list(Request $request)
    {

        $data['modulos'] = Modulos::where('idCurso', $request->idCurso)
                                    ->orderBy('ordem')
                                    ->orderBy('modulo')
                                    ->get();

        return view('modulos.list', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulos  $modulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modulos $modulos)
    {

        $request->validate([
            'modulo' => 'required',
            'ordem' => 'required',
        ]);

        $modulo = Modulos::find($request->idModulo);
        $modulo->modulo = $request->modulo;
        $modulo->ordem = $request->ordem;
        $modulo->save();

        return redirect()->route('modulos.index')
                            ->with('success', 'Módulo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulos  $modulos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $response = [
            'status' => 1,
            'message' => '',
        ];

        $modulo = Modulos::find($request->modulo);

        if( $modulo->conteudo()->count() > 0 ) {
            $response['status'] = 0;
            $response['message'] = 'Existem conteúdos vinculados a este módulo!';
        }else{
            $modulo->delete();
        }

        return response()->json($response);
    }

    public function delete(Request $request)
    {

        $modulo = Modulos::find($request->modulo);

        if( $modulo->conteudo()->count() > 0 ) {
            return redirect()->route('modulos.index')
                            ->with('warning', 'Existem conteúdos vinculados a este módulo!');
        }

        $modulo->delete();

        return redirect()->route('modulos.index')
                            ->with('success', 'Módulo excluído com sucesso!');
    }
}
