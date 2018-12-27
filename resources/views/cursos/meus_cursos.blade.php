@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cursos que estou matriculado</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Meus Cursos</li>
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
                    <div class="card-body">
                      <div class="row">
                      @if( count($cursos) )
                        @foreach( $cursos as $curso )
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $curso->inscricoes->count() }} Inscritos</h3>
                                        <p>{{ $curso->curso }}</p>
                                        <p class="rating-curso"><input type="hidden" class="rating" value="{{ $curso->rating() }}" data-filled="fa fa-star fa-1x" data-empty="fa fa-star-o fa-1x" disabled="disabled" /> ({{ $curso->avaliacoes->count() }})</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <a href="{{ route('cursos.show', $curso->idCurso) }}" class="small-box-footer">
                                      Continuar no curso
                                    <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                      @else
                        <div class=" col-12 alert alert-info">
                          <p>Você não esta matriculado em nenhum curso no momento!</p>
                        </div>
                      @endif
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection

@include('scripts.rating')