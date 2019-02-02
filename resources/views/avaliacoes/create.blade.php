@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1 class="m-0 text-dark">Nova Categoria</h1>-->
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Avaliação</li>
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
            <div class="card-header text-center">
              <h3 class="box-title">Como você avalia este curso?</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')

              <form action="{{ route('avaliacao.store') }}" method="POST">
                  @csrf
                
                   <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <div class="form-group" id="avaliacao">
                              <input type="hidden" class="rating" name="rating" value="{{ $rating }}" data-filled="fa fa-star fa-4x" data-empty="fa fa-star-o fa-4x" />
                          </div>
                          <div class="form-group">
                              <textarea rows="5" class="form-control" name="comentario" placeholder="Dê alguma opiniao sobre o curso!"></textarea>
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Avaliar</button>
                          <a class="btn btn-primary" href="{{ route('cursos.show', $idCurso) }}">Voltar</a>
                          <input type="hidden" name="idCurso" value="{{ $idCurso }}">
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

@include('scripts.rating')