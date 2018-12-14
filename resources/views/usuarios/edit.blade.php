@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar Usuário</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Usuário</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <!--<h3 class="box-title">Categorias de Cursos</h3>-->
              <div class="pull-right">
                  <a class="btn btn-primary" href="{{ route('usuarios.index') }}">Voltar</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')

              <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                
                   <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Nome:</strong>
                              <input type="text" name="name" value="{{ !empty(old('name')) ? old('name') : $usuario->name }}" class="form-control" placeholder="Nome do Usuário">
                          </div>
                          <div class="form-group">
                              <strong>Email:</strong>
                              <input type="email" name="email" value="{{ $usuario->email }}" class="form-control" placeholder="Email do Usuário" disabled>
                          </div>
                          <div class="form-group">
                              <strong>Senha:</strong>
                              <input type="password" name="password" class="form-control" placeholder="Senha do Usuário">
                          </div>

                          @if( auth()->user()->profile == 'admin' )
                              <div class="form-group">
                                  <strong>Perfil:</strong>
                                  <select name="profile" class="form-control">
                                      <option value="">Selecione</option>
                                      <option value="admin" {{ $usuario->profile == 'admin' ? 'selected' : '' }}>ADMINISTRADOR</option>
                                      <option value="user" {{ $usuario->profile == 'user' ? 'selected' : '' }}>USUÁRIO</option>
                                  </select>
                              </div>
                          @endif
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Atualizar</button>
                      </div>
                  </div>
                 
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection