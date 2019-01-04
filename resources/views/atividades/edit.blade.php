@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar Conteúdo</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Conteúdo</li>
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
                  <a class="btn btn-primary" href="{{ route('conteudos.index') }}">Voltar</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')

              <form action="{{ route('conteudos.update', $conteudo->idConteudo) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                
                   <div class="row">

                      <div class="col-xs-5 col-sm-5 col-md-5">
                        <strong>Módulo:</strong>
                        <select id="idModulo" name="idModulo" class="form-control">
                          <option value="">Selecione</option>
                          @foreach( $modulos as $modulo )
                            <option value="{{ $modulo->idModulo }}" {{ $conteudo->idModulo == $modulo->idModulo ? 'selected' : '' }}>{{ $modulo->modulo }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-xs-5 col-sm-5 col-md-5">
                        <strong>Conteúdo:</strong>
                        <input type="text" id="conteudo" name="conteudo" value="{{ $conteudo->conteudo }}" class="form-control" placeholder="Descrição do Conteúdo">
                      </div>
                      <div class="col-xs-1 col-sm-1 col-md-1">
                        <strong>Ordem:</strong>
                        <input type="number" min="0" id="ordem" name="ordem" value="{{ $conteudo->ordem }}" class="form-control">
                      </div>
                      <div class="col-xs-1 col-sm-1 col-md-1">
                      <strong>Tipo:</strong>
                        <select id="tipoConteudo" name="tipoConteudo" class="form-control">
                          <option value="">Selecione</option>
                          <option value="video" {{ $conteudo->tipoConteudo == 'video' ? 'selected' : '' }}>Vídeo</option>
                          <option value="anexo" {{ $conteudo->tipoConteudo == 'anexo' ? 'selected' : '' }}>Anexo</option>
                        </select>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 mb-3 mt-3 text-center">
                        <strong id="descricaoTipo" class="d-block">{{ $conteudo->tipoConteudo == 'video' ? 'Embeded do vídeo:' : 'Documento de Anexo:' }}</strong>
                        <textarea id="video" name="url" class="form-control" rows="5" style="display: {{ $conteudo->tipoConteudo == 'video' ? 'block' : 'none' }};">{{ $conteudo->url }}</textarea>
                        <input type="file" id="anexo" name="anexo" style="display: {{ $conteudo->tipoConteudo == 'anexo' ? 'inline-block' : 'none' }};" />
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Atualizar</button>
                          <input type="hidden" name="idConteudo" value="{{ $conteudo->idConteudo }}">
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

@section('javascript')
<script>
$(function(){
  $("#tipoConteudo").on('change', function(){
    var valor = $(this).val();
    if( valor == 'video' ) {
      $("#descricaoTipo").text("Embeded do vídeo:");
      $("#video").show().val('').focus();
      $("#anexo").hide();
    }else if( valor == 'anexo' ){
      $("#descricaoTipo").text("Documento de Anexo:");
      $("#video").hide();
      $("#anexo").show().click();
    }else{
      $("#descricaoTipo").text("");
      $("#video").hide();
      $("#anexo").hide();
    }
  });
});

</script>
@endsection