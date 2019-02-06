@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Revisão da atividade</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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
              <h3 class="box-title">{{ $atividade->atividade }} (Nota: {{ $nota }})</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">
                
              <div class="row">
                @foreach( $atividade->perguntas as $key => $pergunta )
                  <div class="question col-12">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <strong>Questão {{ $key + 1 }}</strong>
                      <div><?= $pergunta->pergunta ?></div><br>
                    </div>
                    <div class="row">
                      @foreach( $pergunta->alternativas as $key => $alternativa )
                        <div class="col-xs-1 col-sm-1 col-md-1 text-center">
                          <input type="radio" id="{{ $alternativa->idAlternativa }}" class="mt-2" name="certa[{{ $pergunta->idPergunta }}]" value="{{ $alternativa->idAlternativa }}" @if(isset($respT[$pergunta->idPergunta])) {{ ($respT[$pergunta->idPergunta] == $alternativa->idAlternativa) ? 'checked' : '' }} @endif disabled="disabled">
                        </div>
                        <div class="col-xs-11 col-sm-11 col-md-11">
                          <label for="{{ $alternativa->idAlternativa }}">{{ $alternativa->alternativa }}</label>
                        </div>
                      @endforeach
                    </div>
                    @if( isset($respT[$pergunta->idPergunta]) && isset($respA[$pergunta->idPergunta]) )
                      @if( $respT[$pergunta->idPergunta] == $respA[$pergunta->idPergunta] )
                        <div class="alert alert-success col-12">Sua resposta esta correta!</div>
                      @else
                        <div class="alert alert-danger col-12">Sua resposta esta incorreta!</div>
                      @endif
                    @else
                      <div class="alert alert-warning col-12">Nenhuma alternativa foi marcada!</div>  
                    @endif
                  </div>
                @endforeach
              </div>

              <hr>

              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('tentativas.show', $atividade->idAtividade) }}">Voltar</a>
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

@section('javascript')
<script>
$(function(){

  
});
</script>
@endsection