<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cursos;
use App\Categorias;
#use App\Modulos;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(Request $request)
    {

        $data['categorias'] = Categorias::all();

        if( isset( $request->categoria ) ){
            $cursos = Cursos::with(['categoria', 'inscricoes', 'inscrito', 'avaliacoes'])
                        ->where('idCategoria', $request->categoria)
                        ->get();
        }else{
            $cursos = Cursos::with(['categoria', 'inscricoes', 'inscrito', 'avaliacoes'])->get();
        }

        $data['cursos'] = $cursos;

        if (!$request->session()->exists('meuscursos')) {
            $meuscursos = Cursos::with(['inscrito'])->get();
            $request->session()->put('meuscursos', $meuscursos);
        }

        return view('dashboard.dashboard', $data);

    }

}
