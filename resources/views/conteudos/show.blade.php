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
                <h3 class="box-title">{{ $conteudo->conteudo }}</h3>

                <div class="pull-right">
                    <a class="btn btn-primary" href="/cursos/{{ $conteudo->modulo->curso->idCurso }}?m={{ $conteudo->modulo->idModulo }}#collapse{{ $conteudo->modulo->idModulo }}">Voltar aos Módulos</a>
                </div>

              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center" id="box-video">
                            <?php echo $conteudo->url; ?>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        @if( $anterior )
                          <a href="{{ route('conteudos.show', $anterior->idConteudo) }}" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> {{ $anterior->conteudo }}</a>
                        @endif
                        @if( $proximo )
                          <a href="{{ route('conteudos.show', $proximo->idConteudo) }}" class="btn btn-secondary pull-right">{{ $proximo->conteudo }} <i class="fas fa-arrow-circle-right"></i></a>
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
                let icon = data.modulos[i].conteudo[x].tipoConteudo == 'video' ? 'fa fa-file-video' : 'fas fa-paperclip';
                conteudos += "<p><i class='"+icon+"'></i> "+data.modulos[i].conteudo[x].conteudo+"</p>";
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