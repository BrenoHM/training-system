@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header mb-3" style="background-color: #ffc107">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1 class="m-0 text-dark">{{ $curso->curso }}</h1>
            <p class="m-0">Criado por: {{ $curso->instrutor }}</p>
            <p class="m-0">Categoria: {{ $curso->categoria->categoria }}</p>
            <p class="m-0">Criado em: {{ $curso->created_at->format('d/m/Y') }}</p>
            <p class="m-0">Palavras chave: {{ $curso->palavrasChave }}</p>
            <p class="m-0">Alunos inscritos: {{ $curso->inscricoes()->count() }}</p>
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
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')

              @if( $inscrito )
                @include('cursos.modulos')
              @else
                @include('cursos.conteudo')
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