@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuários Cadastrados</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Usuários</li>
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
                  <a class="btn btn-success" href="{{ route('usuarios.create') }}">Novo</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')

              <div class="table-responsive">
                <table class="table table-bordered table-striped dataTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Profile</th>
                      <th data-orderable="false">Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach( $usuarios as $usuario )
                          <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->profile }}</td>
                            <td nowrap>
                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('usuarios.edit', $usuario->id) }}"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este registro?');"><i class="fa fa-trash"></i></button>
                                    @if( auth()->user()->profile == 'admin' )
                                      <a class="btn btn-secondary" href="{{ route('evolucao', $usuario->id) }}" title="Evolução"><i class="fa fa-chart-pie"></i></a>
                                    @endif
                                </form>
                            </td>
                          </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Profile</th>
                      <th>Ação</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
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