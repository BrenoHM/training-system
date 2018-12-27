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

        return view('dashboard.dashboard', $data);

    }

    public function versiontwo()
    {
        return view('dashboard.v2');
    }

    public function versionthree()
    {
        return view('dashboard.v3');
    }
}
