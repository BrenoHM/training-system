@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1 class="m-0 text-dark">{{ $conteudo->conteudo }}</h1>-->
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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
                <h3 class="box-title">{{ $conteudo->conteudo }}</h3>

                <div class="pull-right">
                    <a class="btn btn-primary" href="/cursos/{{ $conteudo->modulo->curso->idCurso }}?m={{ $conteudo->modulo->idModulo }}#collapse{{ $conteudo->modulo->idModulo }}">Voltar aos Módulos</a>
                </div>

              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="card-body">
                    <div class="row">

                        <div class="col-md-12 text-right mb-2">
                          <div class="dropdown" id="anotacoes">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bloco de Anotações</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <textarea rows="10" cols="50" class="form-control" id="anotation" onchange="salvaAnotacao()">{{ isset($conteudo->anotacao()->anotacao) ? $conteudo->anotacao()->anotacao : '' }}</textarea>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12 text-center" id="box-video">
                            @php
                              $extensao = explode(".", $conteudo->url);
                            @endphp
                            @if( $extensao[1] == 'mp3' || $extensao[1] == 'mp4' )
                              <video controls>
                                <source src="{{ url('/uploads/conteudos') }}/{{ $conteudo->url }}" type="video/{{ $extensao[1] }}">
                                Seu browser não suporta elemento de audio.
                              </video>
                            @else
                              <?php echo $conteudo->url; ?>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        @if( $anterior )
                          <a href="{{ route('conteudos.show', $anterior->idConteudo) }}" class="btn btn-secondary btn-previous-mobile"><i class="fas fa-arrow-circle-left"></i> <span class="previous-mobile">{{ $anterior->conteudo }}<span></a>
                        @endif
                        @if( $proximo )
                          <a href="{{ route('conteudos.show', $proximo->idConteudo) }}" class="btn btn-secondary btn-next-mobile pull-right"><span class="next-mobile">{{ $proximo->conteudo }}</span> <i class="fas fa-arrow-circle-right"></i></a>
                        @endif
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              
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

$(function() {
    $('#anotacoes').on('show.bs.dropdown', function () {
        //NAO ESTA FUNCIONANDO
        $("#anotation").trigger('focus');
        //$(this).find('#anotation').show().focus();
    });
});

function salvaAnotacao(){

  var idConteudo = {{ $conteudo->idConteudo }};
  var anotacao = $("#anotation").val();
 
  if( idConteudo != "" ){

    $.ajax({ 
        url: "/anotacao",
        data: {idConteudo: idConteudo, anotacao: anotacao},
        dataType: "json",
        type: "POST",
        beforeSend: function(){
          //$("#div-loader").show();
        },
        success: function(data){

        }
    });

  }

}

</script>
@endsection