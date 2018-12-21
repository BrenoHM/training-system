<?php

namespace App\Http\Controllers;

use App\Conteudos;
use App\Cursos;
use App\Modulos;
use App\ConteudosRealizados;
use Illuminate\Http\Request;

class ConteudosController extends Controller
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

        $validate['url'] = $request->tipoConteudo == 'video' ? 'required' : 'mimes:pdf, xls, xlsx, doc, docx|max:15048';

        $request->validate($validate);

        if( $request->tipoConteudo == 'anexo' ){
            $anexo = md5(time().rand(0,999)) . '.' . $request->url->getClientOriginalExtension();
            $request->url->move(public_path('uploads/conteudos'), $anexo);
        }

        Conteudos::create([
            'conteudo'     => $request->conteudo,
            'tipoConteudo' => $request->tipoConteudo,
            'idModulo'     => $request->idModulo,
            'ordem'        => $request->ordem,
            'url'          => $request->tipoConteudo == 'video' ? $request->url : $anexo,
            'idUsuario'    => $request->user()->id
        ]);

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

        $conteudo = Conteudos::find($request->conteudo);

        if( $conteudo->tipoConteudo == 'anexo' ){
            $path = 'uploads/conteudos/'.$conteudo->url;
            $nomeArquivo = $conteudo->url;
            
            return response()->file($path, [
                'Content-Disposition' => 'inline; filename="'. $nomeArquivo .'"'
            ]);
        }else{
            return view('conteudos.show', ['conteudo' => $conteudo]);
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
                $validate['anexo'] = 'mimes:pdf, xls, xlsx, doc, docx|max:15048';
            }
        }

        $request->validate($validate);

        $anexo = "";
        if( $request->tipoConteudo == 'anexo' ){
            if( !empty($request->anexo) ){

                $anexo = md5(time().rand(0,999)) . '.' . $request->anexo->getClientOriginalExtension();
                $request->anexo->move(public_path('uploads/conteudos'), $anexo);

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

        //DEPOIS LEMBRAR DE TESTAR SE EXISTE ALGUM CONTEUDO REALIZADO

        $conteudo = Conteudos::find($request->conteudo);

        if( $conteudo->tipoConteudo == 'anexo' ) {
            //CASO SEJA UM ANEXO, EXCLUIR O ANEXO DO DISCO
            $anexo = 'uploads/conteudos/'.$conteudo->url;
            if( file_exists($anexo) ){
                unlink($anexo);
            }
        }

        $conteudo->delete();

        //if( $modulo->conteudo()->count() > 0 ) {
        //    return redirect()->route('modulos.index')
        //                    ->with('warning', 'Existem conteúdos vinculados a este módulo!');
        //}

        return redirect()->route('conteudos.index')
                            ->with('success', 'Conteúdo excluído com sucesso!');
    }
}
