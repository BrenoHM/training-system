@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar Atividade</h1>
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
              <!--<h3 class="box-title">Categorias de Cursos</h3>-->
              <div class="pull-right">
                  <a class="btn btn-primary" href="{{ route('atividades.index') }}">Voltar</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')
                
              <form action="{{ route('atividades.update', $atividade->idAtividade) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>Atividade:</strong>
                    <input type="text" name="atividade" value="{{ $atividade->atividade }}" class="form-control" required="required">
                  </div>
                  @foreach( $atividade->perguntas as $pergunta )
                    <div class="col-xs-11 col-sm-11 col-md-11 offset-1">
                      <strong>Pergunta:</strong>
                      <textarea name="perguntas[{{ $pergunta->idPergunta }}]" class="form-control pergunta" rows="10" required="required">{{ $pergunta->pergunta }}</textarea>
                    </div>
                    <div class="row">
                      @foreach( $pergunta->alternativas as $key => $alternativa )
                        
                        @if( $key == 0 )
                          <div class="col-xs-10 col-sm-10 col-md-10 offset-2">
                            <strong>Alternativas:</strong>
                          </div>
                        @endif
                        <div class="col-xs-1 col-sm-1 col-md-1 offset-1 text-center">
                          <input type="radio" class="mt-2" name="certa[{{ $pergunta->idPergunta }}]" value="{{ $alternativa->idAlternativa }}" {{ $alternativa->certa == 1 ? 'checked' : '' }} required="required">
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-10">
                          <input type="text" name="alternativas[{{ $pergunta->idPergunta }}][{{ $alternativa->idAlternativa }}]" value="{{ $alternativa->alternativa }}" class="form-control" required="required">
                        </div>
                        
                      @endforeach
                    </div>
                  @endforeach
                </div>

                <br>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Atualizar</button>
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
<!--<script src="{{ config('app.url') }}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="{{ config('app.url') }}/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>-->

<script src="{{ url('/dist/plugins/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('/dist/plugins/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
<script>

    //CKEDITOR.replace( 'perguntas[*]' );
</script>
<script>
$(function(){
  $('textarea').ckeditor();
});

</script>
@endsection