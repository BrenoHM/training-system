<?php

namespace App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
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
        $data['categorias'] = Categorias::all();
        return view('categorias.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'categoria' => 'required',
        ]);

        Categorias::create([
            'categoria' => $request->categoria,
            'idUsuario' => $request->user()->id
        ]);

        return redirect()->route('categorias.index')
                        ->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorias $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categoria)
    {
        $request->validate([
            'categoria' => 'required',
        ]);

        $categoria->update([
           'categoria' => $request->categoria,
           'idUsuario' => $request->user()->id 
        ]);

        return redirect()->route('categorias.index')
                            ->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categoria)
    {

        if( $categoria->cursos->count() > 0 ) {
            return redirect()->route('categorias.index')
                             ->with('warning', 'Categoria já encontra-se vinculada a um curso!');
        }

        $categoria->delete();
  
        return redirect()->route('categorias.index')
                        ->with('success','Categoria deletada com sucesso!');
    }
}
