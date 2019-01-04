@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Nova Atividade</h1>
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
                <!--<h3 class="box-title">Categorias de Cursos</h3>-->

                @include('layouts.mensagens')

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
                        <select id="idModulo" class="form-control" onchange="populaAtividades(this.value)"></select>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6">
                        <strong>Atividade:</strong>
                        <select id="idAtividade" class="form-control"></select>
                      </div>
                      <div class="col-xs-1 col-sm-1 col-md-1">
                        <strong>&nbsp;</strong>
                        <button class="btn btn-default" data-toggle="modal" data-target="#incluiAtividade">+Atividade</button>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                        <button class="btn btn-primary" onclick="adicionarConteudo()">Cadastrar Questão</button>
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

<!-- Modal -->
<div class="modal" id="incluiAtividade" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Descrição da Atividade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" name="atividade" id="atividade" value="" class="form-control" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" onclick="cadastrarAtividade();">Cadastrar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript')
<script>
$(function(){

  $('#incluiAtividade').on('shown.bs.modal', function () {
    $('#atividade').trigger('focus');
  });

  $('#incluiAtividade').on('hidden.bs.modal', function (e) {
    $('#atividade').val('');
  });
  
});

function populaAtividades(idModulo) {

  if( idModulo != "" ){
    $.ajax({ 
        url: "{{url('/atividades/list/')}}/"+idModulo,
        data: {},
        dataType: "json",
        type: "GET",
        beforeSend: function(){
          $("#div-loader").show();
        },
        success: function(data){
          var options = "<option value=''>Selecione</option>";
        
          for( i in data.atividades )
          {
            options += "<option value='"+data.atividades[i].idAtividade+"'>"+data.atividades[i].atividade+"</option>";
          }
          
          $("#idAtividade").html(options);
          
          $("#div-loader").hide();
        }
    });
  }

}

function cadastrarAtividade() {

  var idModulo = $("#idModulo").val();
  var atividade = $("#atividade").val();

  if( idModulo != "" && idModulo != null ){
    if( atividade != "" ){

      $.ajax({ 
          url: "{{route('atividades.store')}}",
          data: {idModulo:idModulo, atividade: atividade},
          dataType: "json",
          type: "POST",
          beforeSend: function(){
            $("#div-loader").show();
          },
          success: function(data){
            if( data.status == 1 ){
              populaAtividades(idModulo);
            }else{
              alert(data.message);
            }
            $('#incluiAtividade').modal('hide');
            $("#div-loader").hide();
          }
      });

    }
  }else{
    alert('Favor selecionar o módulo desejado!');
  }
  
}

function buscaModulos(idCurso){

  if( idCurso != "" ){

    $.ajax({ 
        url: "{{url('/modulos/list/')}}/"+idCurso,
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

            if( data.modulos[i].atividade ){
              for( x in data.modulos[i].atividade )
              {
                let icon = 'fas fa-tasks';
                conteudos += "<p>"+data.modulos[i].atividade[x].idAtividade+". <i class='"+icon+"'></i> "+data.modulos[i].atividade[x].atividade+"</p>";
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

</script>
@endsection