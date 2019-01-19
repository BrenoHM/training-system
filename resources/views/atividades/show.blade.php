@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1 class="m-0 text-dark">{{ $atividade->atividade }}</h1>-->
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Atividade</li>
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
              <h3 class="box-title">{{ $atividade->atividade }}</h3>
              <div class="pull-right">
                  <a class="btn btn-primary" href="{{ route('tentativas.show', $atividade->idAtividade) }}">Voltar</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')
                
              <form action="{{ route('atividades.update', $atividade->idAtividade) }}" method="POST">
                @csrf
                <div class="row">
                  @foreach( $atividade->perguntas as $key => $pergunta )
                    <div class="question col-12">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <strong>Questão {{ $key + 1 }}</strong>
                        <div>{{ $pergunta->pergunta }}</div><br>
                      </div>
                      <div class="row">
                        @foreach( $pergunta->alternativas as $key => $alternativa )
                          <div class="col-xs-1 col-sm-1 col-md-1 text-center">
                            <input type="radio" id="{{ $alternativa->idAlternativa }}" class="mt-2" name="certa[{{ $pergunta->idPergunta }}]" value="{{ $alternativa->idAlternativa }}" {{ $alternativa->certa == 1 ? 'checked' : '' }} required="required">
                          </div>
                          <div class="col-xs-11 col-sm-11 col-md-11">
                            <label for="{{ $alternativa->idAlternativa }}">{{ $alternativa->alternativa }}</label>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  @endforeach
                </div>

                <hr>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Finalizar</button>
                  <input type="hidden" name="idAtividade" value="{{ $atividade->idAtividade }}">
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

@section('javascript')
<script>
$(function(){
  
});

</script>
@endsection