<?php

namespace App\Http\Controllers;

use App\User;
use App\Inscricoes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['edit', 'update']);

        /*$this->middleware(function ($request, $next) {
            dd($request->usuario->id);
            if( $request->usuario->id != Auth::user()->id && Auth::user()->profile != 'admin' ){
                dd('bloqueado');
            }
            return $next($request);
        });*/
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['usuarios'] = User::all();
        return view('usuarios.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'profile' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile' => $request->profile,
        ]);

        //ENVIO DE EMAIL INFORMANDO AO USUARIO  SEU EMAIL E SENHA
        Mail::to('emaildobrenomol@gmail.com')
        //->cc('copy@email.com')
        ->send(new \App\Mail\SendMailUser($request->name, $request->email, $request->password));

        return redirect()->route('usuarios.index')
                        ->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        
        if( $usuario->id != Auth::user()->id && Auth::user()->profile != 'admin' ){
            return redirect()->route('home')->with('info', 'Acesso não permitido a este usuário!');
        }

        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $validate = [
            'name' => 'required|string|max:255',
        ];

        //VALIDA SENHA CASO VENHA PREENCHIDA
        if( !empty($request->password) ) {
            $validate['password'] = 'required|string|min:6';
        }

        //CASO SEJA ADMINISTRADOR O PROFILE E OBRIGATORIO
        if( Auth::user()->profile == 'admin' ){
            $validate['profile'] = 'required';
        }

        $request->validate($validate);

        $fileds = [
            'name' => $request->name,
        ];

        //ATUALIZA SENHA CASO VENHA PREENCHIDA
        if( !empty($request->password) ) {
            $fileds['password'] = Hash::make($request->password);
        }

        //CASO SEJA ADMINISTRADOR O PROFILE E OBRIGATORIO
        if( Auth::user()->profile == 'admin' ){
            $fileds['profile'] = $request->profile;
        }

        User::where('id', $request->usuario)->update($fileds);

        $route = Auth::user()->profile == 'admin' ? 'usuarios.index' : 'home';
    
        return redirect()->route($route)
                    ->with('success', 'Usuário atualizado com sucesso!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function evolucao(Request $request)
    {

        $with = ['curso', 'curso.modulos', 'curso.modulos.conteudo'];

        $inscricoes = Inscricoes::with($with)->where('idUsuario', $request->idUsuario)->get();

        $data['usuario']    = User::find($request->idUsuario);
        $data['inscricoes'] = $inscricoes;

        return view('usuarios.evolucao', $data);
    }
}
