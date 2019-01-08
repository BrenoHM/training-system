<?php

namespace App\Http\Controllers;

use App\Atividades;
use App\Cursos;
use App\Perguntas;
use App\Alternativas;
use Illuminate\Http\Request;

class AtividadesController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['atividades'] = Atividades::with('modulo', 'modulo.curso')->get();
        return view('atividades.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cursos'] = Cursos::all();
        return view('atividades.create', $data);
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

        //VERIFICA SE A ATIVIDADE JA EXISTE
        $atividadeExiste = Atividades::where('atividade', $request->atividade)
                                    ->where('idModulo', $request->idModulo)
                                    ->count();

        if( $atividadeExiste ) {
            $response = [
                'status'  => 0,
                'message' => 'Já existe uma atividade cadastrada para este módulo!',
            ];
        }

        if( $response['status'] == 1 ) {
            Atividades::create([
                'atividade'     => $request->atividade,
                'idModulo'     => $request->idModulo,
                'idUsuario'    => $request->user()->id
            ]);
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atividades  $atividades
     * @return \Illuminate\Http\Response
     */
    public function show(Atividades $atividades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atividades  $atividades
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
    }

    public function list(Request $request)
    {

        $data['atividades'] = Atividades::where('idModulo', $request->idModulo)->get();

        return response()->json($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atividades  $atividades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atividades $atividades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atividades  $atividades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atividades $atividades)
    {
        //
    }

    public function cadastraPergunta(Request $request)
    {
        
        //CADASTRO DA PERGUNTA
        $pergunta = Perguntas::create([
                        'pergunta'    => $request->pergunta,
                        'idAtividade' => $request->idAtividade,
                        'idUsuario'   => $request->user()->id
                    ]);

        //CADASTRO DAS ALTERNATIVAS
        if( $pergunta ) {
            foreach ($request->alternativas as $key => $value) {
                Alternativas::create([
                    'alternativa' => $value,
                    'idPergunta'  => $pergunta->idPergunta,
                    'certa'       => $request->radios[$key] === 'true' ? 'S' : 'N'
                ]);
            }
        }

    }
}
