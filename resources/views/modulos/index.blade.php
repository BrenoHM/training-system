@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Módulos Cadastrados</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Módulos</li>
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
                  <a class="btn btn-success" href="{{ route('modulos.create') }}">Novo</a>
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
                      <th>Modulo</th>
                      <th>Curso</th>
                      <th data-orderable="false">Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach( $modulos as $modulo )
                          <tr>
                            <td>{{ $modulo->idModulo }}</td>
                            <td>{{ $modulo->modulo }}</td>
                            <td>{{ $modulo->curso->curso }}</td>
                            <td nowrap>
                                <form action="/modulos/{{ $modulo->idModulo }}/delete" method="POST">
                                    <a class="btn btn-primary" href="{{ route('modulos.edit', $modulo->idModulo) }}"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este registro?');"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                          </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Curso</th>
                      <th>Categoria</th>
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