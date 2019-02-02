@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar Módulo</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Modulo</li>
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
                  <a class="btn btn-primary" href="{{ route('modulos.index') }}">Voltar</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')

              <form action="{{ route('modulos.update', $idModulo) }}" method="POST">
                  @csrf
                  @method('PUT')
                
                   <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Módulo:</strong>
                              <input type="text" name="modulo" value="{{ $modulo }}" class="form-control" placeholder="Módulo do Curso">
                          </div>
                          
                          <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <strong>Ordem:</strong>
                                <input type="number" name="ordem" value="{{ $ordem }}" class="form-control">
                            </div>
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Atualizar</button>
                          <input type="hidden" name="idModulo" value="{{ $idModulo }}">
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