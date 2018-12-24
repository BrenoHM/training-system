@extends('layouts.master') 
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Cursos disponíveis na plataforma</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
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

      @include('layouts.mensagens')

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form name="form">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <select name="categoria" class="form-control" onchange="form.submit();">
                      <option value="">Selecione uma categoria</option>
                      @foreach( $categorias as $categoria )
                        <option value="{{ $categoria->idCategoria }}" {{ (!empty(app('request')->input('categoria')) && app('request')->input('categoria') == $categoria->idCategoria) ? 'selected' : '' }}>
                          {{ $categoria->categoria }} ( {{ $categoria->cursos->count() }} )
                        </option>
                      @endforeach
                    </select>
                  </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                    <div class="row">
                    @if( count($cursos) )
                      @foreach( $cursos as $curso )
                          <div class="col-lg-3 col-6">
                              <div class="small-box {{ $curso->inscrito->count() > 0 ? 'bg-success' : 'bg-info' }}">
                                  <div class="inner">
                                      <h3>{{ $curso->inscricoes->count() }} Inscritos</h3>
                                      <p>{{ $curso->curso }}</p>
                                  </div>
                                  <div class="icon">
                                      <i class="fas fa-graduation-cap"></i>
                                  </div>
                                  <a href="{{ route('cursos.show', $curso->idCurso) }}" class="small-box-footer">
                                    {{ $curso->inscrito->count() > 0 ? 'Continuar no curso' : 'Mais informações' }}
                                  <i class="fa fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                      @endforeach
                    @else
                      <div class=" col-12 alert alert-info">
                        <p>Não há nenhum curso cadastrado no momento!</p>
                      </div>
                    @endif
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
 
@section('javascript')

@stop