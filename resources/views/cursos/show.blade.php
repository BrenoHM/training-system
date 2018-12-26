@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header mb-4" style="background-color: #ffc107">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1 class="m-0 text-dark">{{ $curso->curso }}</h1>
            <p class="m-0">Criado por: {{ $curso->instrutor }}</p>
            <p class="m-0">Categoria: {{ $curso->categoria->categoria }}</p>
            <p class="m-0">Criado em: {{ $curso->created_at->format('d/m/Y') }}</p>
            <p class="m-0">Palavras chave: {{ $curso->palavrasChave }}</p>
            <p class="m-0">Alunos inscritos: {{ $curso->inscricoes()->count() }}</p>
            <p>
              <a href="">
                <input type="hidden" class="rating" value="3" data-filled="fa fa-star fa-1x" data-empty="fa fa-star-o fa-1x" />
                Editar Avaliação
              </a>
            </p>
          </div>
          <div class="col-sm-3">
            @if( !$inscrito )
              <div class="pull-right">
                <form method="POST" action="{{ route('inscricoes.store') }}">
                  @csrf
                  <input type="hidden" name="curso" value="{{ $curso->idCurso }}" />
                  <input type="submit" class="btn btn-primary" value="Matricular-se" />
                </form>
              </div>
            @endif
          </div>
          <!-- /.col -->
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cursos</li>
            </ol>
          </div>-->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      @if( $inscrito && $certificado )
        <div class="col-sm-12 mb-4">
          <div class="pull-right">
            <a href="{{ route('certificado', $curso->idCurso) }}" title="Emitir Certificado" target="_blank">
              <i class="fas fa-2x fa-certificate"></i>
            </a>
          </div>
        </div>
      @endif
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
              <h3 class="box-title">Conteúdo do Curso</h3>
              <div class="glyphicon glyphicon-heart"></div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')

              @if( count($curso->modulos) )
                @if( $inscrito )
                  @include('cursos.modulos')
                @else
                  @include('cursos.conteudo')
                @endif
              @else
              <div class=" col-12 alert alert-info">
                <p>Não há nenhum conteúdo cadastrado no momento!</p>
              </div>
              @endif

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

@section('css')
<link rel="stylesheet" href="/dist/plugins/rating/bootstrap-rating.css">
@endsection

@section('javascript')
<script src="/dist/js/bootstrap-rating.min.js"></script>
<script>
$(function(){
  $('.rating').rating();
});
</script>
@endsection