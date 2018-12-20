@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Novo Conteúdo</h1>
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

                <div class="row">
                  <div class="form-group">
                    <strong>Curso:</strong>
                    <select id="idCurso" class="form-control" onchange="buscaModulos(this.value);">
                      <option value="">Selecione</option>
                      @foreach( $cursos as $curso )
                          <option value="{{ $curso->idCurso }}">{{ $curso->curso }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <!-- /.box-header -->
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="card-body">
                    <div class="row mb-4">
                      <div class="col-xs-5 col-sm-5 col-md-5">
                        <strong>Módulo:</strong>
                        <select id="idModulo" class="form-control"></select>
                      </div>
                      <div class="col-xs-5 col-sm-5 col-md-5">
                        <strong>Conteudo:</strong>
                        <input type="text" name="conteudo" id="conteudo" value="" class="form-control" placeholder="Descrição do Conteúdo">
                      </div>
                      <div class="col-xs-1 col-sm-1 col-md-1">
                        <strong>Tipo:</strong>
                        <select id="tipoConteudo" class="form-control">
                          <option value="">Selecione</option>
                          <option value="video">Vídeo</option>
                          <option value="anexo">Anexo</option>
                        </select>
                      </div>
                      <div class="col-xs-1 col-sm-1 col-md-1">
                        <strong>Ordem:</strong>
                        <input type="number" name="ordem" id="ordem" value="" class="form-control">
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 mb-2 text-center">
                        <strong id="descricaoTipo"></strong>
                        <textarea id="video" class="form-control" style="display: none;"></textarea>
                        <input type="file" id="anexo" style="display: none;" />
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button class="btn btn-primary" onclick="adicionarConteudo()">Cadastrar Conteúdo</button>
                      </div>
                    </div>

                    <!-- SEÇÃO ONDE SERÃO LISTADOS OS CONTEUDOS -->
                    <div class="row">
                      <div class="col-md-12" id="conteudos">
                      </div>
                    </div>

                  </div>
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
  $("#tipoConteudo").on('change', function(){
    var valor = $(this).val();
    if( valor == 'video' ) {
      $("#descricaoTipo").text("Embeded do vídeo");
      $("#video").show();
      $("#anexo").hide();
    }else if( valor == 'anexo' ){
      $("#descricaoTipo").text("Documento de Anexo");
      $("#video").hide();
      $("#anexo").show();
    }else{
      $("#descricaoTipo").text("");
      $("#video").hide();
      $("#anexo").hide();
    }
  });
});

function buscaModulos(idCurso){

  if( idCurso != "" ){

    $.ajax({ 
        url: "/modulos/" + idCurso + "/list",
        data: {json: true},
        dataType: "json",
        type: "GET",
        beforeSend: function(){
          $("#div-loader").show();
        },
        success: function(data){

          var options = "<option value=''>Selecione</option>";
          
          var conteudos = "";

          for( i in data.modulos )
          {
            options += "<option value='"+data.modulos[i].idModulo+"'>"+data.modulos[i].modulo+"</option>";
            conteudos += "<div class='card'>";
            conteudos += "<div class='card-header'><h3 class='box-title'>"+data.modulos[i].modulo+"</h3></div>";
            conteudos += "<div class='card-body'>";

            if( data.modulos[i].conteudo ){
              for( x in data.modulos[i].conteudo )
              {
                conteudos += "<p><i class='fa fa-file-video'></i> "+data.modulos[i].conteudo[x].conteudo+"</p>";
              }
            }

            conteudos += "</div>";
            conteudos += "</div>";
          }
          
          $("#idModulo").html(options);
          $("#conteudos").html(conteudos);
          $("#div-loader").hide();

        }
    });

  }

}

function adicionarConteudo(){

  var idCurso      = $("#idCurso").val();
  var idModulo     = $("#idModulo").val();
  var conteudo     = $("#conteudo").val();
  var tipoConteudo = $("#tipoConteudo").val();
  var ordem        = $("#ordem").val();
  var url          = "";

  urlOk = true;
  if( tipoConteudo == 'video' ){
    url = $("#video").val();
    if( url == "" ){
      urlOk = false;
    }
  }else if( tipoConteudo == 'anexo' ){
    url = $('#anexo')[0].files[0];
    if( typeof url === typeof undefined ){
      urlOk = false;
    }
  }

  if( idCurso != "" && idModulo != "" && conteudo != "" && tipoConteudo != "" && ordem != "" && urlOk ){
    
    var formData = new FormData();
    formData.append("idModulo", idModulo);
    formData.append("conteudo", conteudo);
    formData.append("tipoConteudo", tipoConteudo);
    formData.append("ordem", ordem);
    formData.append("url", url);

    $.ajax({ 
        method: "POST",
        url: "{{ route('conteudos.store') }}",
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        beforeSend: function(){
          $("#div-loader").show();
        },
        success: function(data){
          $("#div-loader").hide();
          if( data.status == 1 ){
            $("#idModulo").val('');
            $("#conteudo").val('');
            $("#tipoConteudo").val('');
            $("#ordem").val('');
            $("#video").val('');
            $("#anexo").val('');
            buscaModulos(idCurso);
          }
        }
    });
  }

}

function deleteModulos(idModulo){

  if( confirm('Deseja realmente excluir este módulo?') ){

    var idCurso = $("#idCurso").val();

    if( idModulo != "" ){

      $.ajax({ 
          url: "/modulos/" + idModulo,
          data: {},
          dataType: "json",
          type: "DELETE",
          beforeSend: function(){
            $("#div-loader").show();
          },
          success: function(data){
            $("#div-loader").hide();
            if( data.status == 1 ){
              buscaModulos(idCurso);
            }else if( data.status == 0 ){
              alert(data.message);
            }
          }
      });

    }

  }

}
</script>
@endsection