<?php

namespace App\Http\Controllers;

use App\Atividades;
use App\Cursos;
use App\Perguntas;
use App\Alternativas;
use App\Tentativas;
use App\Respostas;
use Illuminate\Http\Request;

class AtividadesController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('auth');
        $this->middleware('admin')->except('show');
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
    public function show(Request $request)
    {

        $idTentativa = $request->atividade;

        $idAtividade = Tentativas::find($idTentativa)->idAtividade;

        $atividade = Atividades::getAtividade($idAtividade);

        $respostas = Respostas::where('idTentativa', $idTentativa)
                                ->where('idAtividade', $idAtividade)
                                ->get();

        $data['respostas'] = [];

        if( count($respostas) ) {
            foreach ( $respostas as $resposta ) {
                $data['respostas'][$resposta->idPergunta] = $resposta->idAlternativa;
            }
        }

        $data['idTentativa'] = $idTentativa;

        $data['atividade'] = $atividade;

        return view('atividades.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atividades  $atividades
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $atividade = Atividades::with(['perguntas', 'perguntas.alternativas'])->where('idAtividade', $request->atividade)->first();

        $data['atividade'] = $atividade;

        return view('atividades.edit', $data);
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
        
        $dados = $request->all();

        //ATUALIZANDO A ATIVIDADE
        Atividades::where('idAtividade', $dados['idAtividade'])->update([
            'atividade' => $dados['atividade'],
            'idUsuario' => $request->user()->id,
        ]);

        //ATUALIZANDO PERGUNTAS
        foreach ( $dados['perguntas'] as $idPergunta => $pergunta ) {

            Perguntas::where('idPergunta', $idPergunta)->update([
                'pergunta' => $pergunta,
                'idUsuario' => $request->user()->id,
            ]);

            //ATUALIZANDO AS ALTERNATIVAS
            foreach ( $dados['alternativas'][$idPergunta] as $idAlternativa => $alternativa ) {

                Alternativas::where('idAlternativa', $idAlternativa)->update([
                    'alternativa' => $alternativa,
                    'certa'       => ( $dados['certa'][$idPergunta] == $idAlternativa ) ? '1' : '0',
                ]);

            }

        }

        return redirect()->route('atividades.index')->with('success', 'Atividade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atividades  $atividades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $atividade = Atividades::with(['perguntas', 'perguntas.alternativas'])->where('idAtividade', $request->atividade)->first();

        $perguntas = $atividade->perguntas();

        foreach ( $perguntas->get() as $pergunta ) {
            //DELETA ALTERNATIVAS
            Alternativas::where('idPergunta', $pergunta->idPergunta)->delete();
        }

        // DELETA PERGUNTAS
        $perguntas->delete();

        //DELETA ATIVIDADE
        $atividade->delete();

        return redirect()->route('atividades.index')->with('success', 'Atividade excluída com sucesso!');

    }

    public function cadastraPergunta(Request $request)
    {

        $response = [
            'status'  => 1,
            'message' => '',
        ];
        
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
                    'certa'       => $request->radios[$key] === 'true' ?? 'S'
                ]);
            }
        }else{

            $response = [
                'status'  => 0,
                'message' => 'Erro ao cadastrar pergunta!',
            ];

        }

        return response()->json($response);

    }
}
