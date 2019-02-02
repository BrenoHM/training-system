@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar Categoria</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Categorias</li>
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
                  <a class="btn btn-primary" href="{{ route('categorias.index') }}">Voltar</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')

              <form action="{{ route('categorias.update', $categoria->idCategoria) }}" method="POST">
                  @csrf
                  @method('PUT')
                
                   <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Categoria:</strong>
                              <input type="text" name="categoria" value="{{ $categoria->categoria }}" class="form-control" placeholder="Categoria">
                          </div>
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