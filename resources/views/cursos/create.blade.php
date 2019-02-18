@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Novo Curso</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Novo Curso</li>
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
                  <a class="btn btn-primary" href="{{ route('cursos.index') }}">Voltar</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')

              <form action="{{ route('cursos.store') }}" method="POST">
                  @csrf
                
                   <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Título:</strong>
                              <input type="text" name="curso" value="{{ old('curso') }}" class="form-control" placeholder="Título do Curso">
                          </div>
                          <div class="form-group">
                              <strong>Categoria:</strong>
                              <select name="idCategoria" class="form-control">
                                  <option value="">Selecione</option>
                                  @foreach( $categorias as $categoria )
                                      <option value="{{ $categoria->idCategoria }}" {{ $categoria->idCategoria == old('idCategoria') ? 'selected' : '' }}>{{ $categoria->categoria }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <strong>Instrutor:</strong>
                              <input type="text" name="instrutor" value="{{ old('instrutor') }}" class="form-control" placeholder="Instrutor do Curso">
                          </div>
                          <div class="form-group">
                              <strong>Palavras Chave:</strong>
                              <input type="text" name="palavrasChave" value="{{ old('palavrasChave') }}" class="form-control" placeholder="Palavras Chave do Curso">
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Cadastrar</button>
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