@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Novo Módulo</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Modulo</li>
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
                    <a class="btn btn-primary" href="{{ route('modulos.index') }}">Voltar</a>
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
                      <div class="col-xs-10 col-sm-10 col-md-10">
                        <strong>Módulo:</strong>
                        <input type="text" name="modulo" id="modulo" value="" class="form-control" placeholder="Descrição do Módulo">
                      </div>
                      <div class="col-xs-1 col-sm-1 col-md-1">
                        <strong>Ordem:</strong>
                        <input type="number" min="0" name="ordem" id="ordem" value="" class="form-control">
                      </div>
                      <div class="col-xs-1 col-sm-1 col-md-1 text-center">
                        <strong>Cadastrar:</strong>
                        <button class="btn btn-primary" onclick="adicionarModulo()">+</button>
                      </div>
                    </div>

                    <h3 class="text-center">Módulos Cadastrados</h3>

                    <div id="modulos"></div>

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
  
});

function buscaModulos(idCurso){

  if( idCurso != "" ){

    $.ajax({ 
        url: "{{url('/modulos/list/')}}/"+idCurso,
        data: {json: false},
        dataType: "html",
        type: "GET",
        beforeSend: function(){
          $("#div-loader").show();
        },
        success: function(data){
          $("#modulos").html(data);
          $("#div-loader").hide();
        }
    });

  }

}

function adicionarModulo(){

  var idCurso = $("#idCurso").val();
  var modulo  = $("#modulo").val();
  var ordem   = $("#ordem").val();

  if( idCurso != "" && modulo != "" && ordem != "" ){
    $.ajax({ 
        url: "{{ route('modulos.store') }}",
        data: {idCurso: idCurso, modulo: modulo, ordem: ordem},
        dataType: "json",
        type: "POST",
        beforeSend: function(){
          $("#div-loader").show();
        },
        success: function(data){
          $("#div-loader").hide();
          if( data.status == 1 ){
            $("#modulo").val('');
            $("#ordem").val('');
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