<?php

namespace App\Http\Controllers;

use App\Conteudos;
use App\Cursos;
use App\Modulos;
use App\ConteudosRealizados;
use App\Anotacoes;
use Illuminate\Http\Request;

class ConteudosController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('auth');
        $this->middleware('admin')->except(['show', 'anotacao', 'minhasAnotacoes']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['conteudos'] = Conteudos::with('modulo', 'modulo.curso')->get();
        return view('conteudos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['cursos'] = Cursos::all();
        return view('conteudos.create', $data);
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

        $validate = [
            'conteudo'     => 'required',
            'tipoConteudo' => 'required',
            'idModulo'     => 'required',
            'ordem'        => 'required',
        ];

        //$validate['url'] = $request->tipoConteudo == 'video' ? 'required' : 'mimes:pdf, xls, xlsx, doc, docx|max:15048';

        $request->validate($validate);

        //VERIFICA SE O CONTEUDO JA EXISTE
        $conteudoExiste = Conteudos::where('idModulo', $request->idModulo)
                                    ->where('ordem', $request->ordem)
                                    ->count();

        if( $conteudoExiste ) {
            $response = [
                'status'  => 0,
                'message' => 'Já existe um conteúdo cadastrado nessa ordem!',
            ];
        }

        if( $response['status'] == 1 ){
            
            if( $request->tipoConteudo == 'anexo' ){

                $extensions = array("pdf", "xls","xlsx","doc","docx", "mp3", "mp4");

                $extensao = $request->url->getClientOriginalExtension();

                $result = array($extensao);
                
                if( in_array( $result[0], $extensions ) ){
                    $anexo = md5(time().rand(0,999)) . '.' . $extensao;
                    $request->url->move(public_path('uploads/conteudos'), $anexo);
                }else{
                    $response = [
                        'status'  => 0,
                        'message' => 'Extensõees permitidas são pdf, xls, xlsx, doc, docx!',
                    ];
                }
            }

            if( $response['status'] == 1 ){

                Conteudos::create([
                    'conteudo'     => $request->conteudo,
                    'tipoConteudo' => $request->tipoConteudo,
                    'idModulo'     => $request->idModulo,
                    'ordem'        => $request->ordem,
                    'url'          => $request->tipoConteudo == 'video' ? $request->url : $anexo,
                    'idUsuario'    => $request->user()->id
                ]);

            }

        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conteudos  $conteudos
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $conteudo = Conteudos::find($request->conteudo);

        if( $conteudo->modulo->curso->inscrito->count() == 0 ) {
            return redirect()->route('home')
                            ->with('warning', 'Você ainda nao se matriculou neste curso!');
        }

        $idCurso  = $conteudo->modulo->curso->idCurso;

        //MARCA CONTEUDO COMO FEITO
        $isRealizado = ConteudosRealizados::where('idUsuario', $request->user()->id)
                                            ->where('idConteudo', $request->conteudo)
                                            ->count();
        if( $isRealizado == 0 ){
            ConteudosRealizados::create([
                'idUsuario' => $request->user()->id,
                'idConteudo' => $request->conteudo
            ]);
        }

        $extensao    = explode(".", $conteudo->url);
        $extVideos   = ['mp3', 'mp4'];

        if( $conteudo->tipoConteudo == 'anexo' && !in_array($extensao[1], $extVideos) ){

            $path        = 'uploads/conteudos/'.$conteudo->url;
            $nomeArquivo = $conteudo->url;
            
            return response()->file($path, [
                'Content-Disposition' => 'inline; filename="'. $nomeArquivo .'"'
            ]);

        }else{

            $conteudos = Conteudos::join('modulos', 'modulos.idModulo', '=', 'conteudos.idModulo')
                            ->where('modulos.idCurso', $idCurso)
                            ->whereIn('conteudos.tipoConteudo', ['video', 'anexo'])
                            ->orderBy('modulos.ordem')
                            ->orderBy('modulos.modulo')
                            ->orderBy('conteudos.ordem')
                            ->orderBy('conteudos.conteudo')->get();

            $anterior = null;
            $proximo  = null;

            foreach( $conteudos as $key => $value ) {
                if( $value->idConteudo == $request->conteudo ){
                    if( isset($conteudos[$key+1]) ) {
                        $proximo = $conteudos[$key+1];
                    }
                    if( isset($conteudos[$key-1]) ) {
                        $anterior = $conteudos[$key-1];
                    }
                    break;
                }
            }
            return view('conteudos.show', ['conteudo' => $conteudo, 'anterior' => $anterior, 'proximo' => $proximo]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conteudos  $conteudos
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $conteudo = Conteudos::find($request->conteudo);
        $modulos = Modulos::where('idCurso', $conteudo->modulo->curso->idCurso)->orderBy('ordem')->orderBy('modulo')->get();
        $data = [
            'conteudo' => $conteudo,
            'modulos' => $modulos
        ];
        return view('conteudos.edit', $data);
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

        $validate = [
            'idConteudo'   => 'required',
            'conteudo'     => 'required',
            'tipoConteudo' => 'required',
            'idModulo'     => 'required',
            'ordem'        => 'required',
        ];

        $conteudo = Conteudos::find($request->idConteudo);

        if( $request->tipoConteudo == 'video' ) {
            $validate['url'] = 'required';
        }else{
            if( !empty($request->anexo) || $conteudo->tipoConteudo != 'anexo' ){
                //$validate['anexo'] = 'mimes:pdf, xls, xlsx, doc, docx|max:15048';
                $extensions = array("pdf", "xls","xlsx","doc","docx", "mp3", "mp4");

                $extensao = $request->anexo->getClientOriginalExtension();

                $result = array($extensao);
            }
        }

        $request->validate($validate);

        $anexo = "";
        if( $request->tipoConteudo == 'anexo' ){
            if( !empty($request->anexo) ){

                if( in_array( $result[0], $extensions ) ){
                    $anexo = md5(time().rand(0,999)) . '.' . $request->anexo->getClientOriginalExtension();
                    $request->anexo->move(public_path('uploads/conteudos'), $anexo);
                }else{
                    return redirect()->route('conteudos.edit', $request->idConteudo)
                            ->with('warning', 'Extensões permitidas pdf, xls, xlsx, doc, docx, mp3, mp4!');
                }

                //APAGA, SE EXISTIR, O ARQUIVO ANTIGO
                $arq = 'uploads/conteudos/'.$conteudo->url;
                if( file_exists($arq) ){
                    unlink($arq);
                }
            }
        }else{
            if($conteudo->tipoConteudo != 'video'){
                $arq = 'uploads/conteudos/'.$conteudo->url;
                if( file_exists($arq) ){
                    unlink($arq);
                }
            }
        }

        $conteudo->conteudo     = $request->conteudo;
        $conteudo->tipoConteudo = $request->tipoConteudo;
        $conteudo->idModulo     = $request->idModulo;
        $conteudo->ordem        = $request->ordem;

        if( $request->tipoConteudo == 'anexo' ){
            if( !empty($request->anexo) ){
                $conteudo->url = $anexo;
            } 
        }else{
            $conteudo->url = $request->url;
        }
        
        $conteudo->save();

        return redirect()->route('conteudos.index')
                            ->with('success', 'Conteúdo atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conteudos  $conteudos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        //$request->validate([
        //    'conteudo' => 'required',
        //]);

        $conteudoRealizado = ConteudosRealizados::where('idConteudo', $request->conteudo)->count();

        if( $conteudoRealizado ) {
            return redirect()->route('conteudos.index')
                             ->with('warning', 'Conteúdo já foi realizado!');
        }

        $conteudo = Conteudos::find($request->conteudo);

        if( $conteudo->tipoConteudo == 'anexo' ) {
            //CASO SEJA UM ANEXO, EXCLUIR O ANEXO DO DISCO
            $anexo = 'uploads/conteudos/'.$conteudo->url;
            if( file_exists($anexo) ){
                unlink($anexo);
            }
        }

        $conteudo->delete();

        return redirect()->route('conteudos.index')
                         ->with('success', 'Conteúdo excluído com sucesso!');
    }

    public function anotacao(Request $request)
    {

        $anotacao = Anotacoes::where('idConteudo', $request->idConteudo)
                             ->where('idUsuario', $request->user()->id)
                             ->first();

        if( $anotacao ) {
            $anotacao->anotacao = $request->anotacao;
            $anotacao->save();
        }else{
            Anotacoes::create([
                'idConteudo' => $request->idConteudo,
                'idUsuario'  => $request->user()->id,
                'anotacao'   => $request->anotacao,
            ]);
        }

    }

    public function minhasAnotacoes(Request $request)
    {
        $anotacoes = Anotacoes::with('conteudo', 'conteudo.modulo', 'conteudo.modulo.curso')
                                ->where('idUsuario', $request->user()->id)
                                ->get();

        return view('anotacoes.minhas_anotacoes', ['anotacoes' => $anotacoes]);
    }
}
