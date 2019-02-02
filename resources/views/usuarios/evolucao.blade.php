@extends('layouts.master') 
@section('content')
<div class="content-wrapper">

	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1 class="m-0 text-dark">Evolução do Aluno</h1>-->
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Evolução</li>	
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Evolução de {{ $usuario->name }}</h3>
              <div class="glyphicon glyphicon-heart"></div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')

              @if( count($inscricoes) )
                
                <div id="accordion">
				  @foreach( $inscricoes as $inscricao )
				    <div class="card card-secondary">
				      <div class="card-header">
				        <h4 class="card-title">
				          <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $inscricao->curso->idCurso }}">
				            {{ $inscricao->curso->curso }} <strong>({{ $inscricao->curso->porcentagemAssistidas($inscricao->curso->idCurso, $usuario->id) }}%)</strong>
				          </a>
				        </h4>
				      </div>
				      <div id="collapse{{ $inscricao->curso->idCurso }}" class="panel-collapse collapse">
				        <div class="card-body">
				          <ul class="list-unstyled">
				            @foreach( $inscricao->curso->modulos as $modulo )
				              <li class="mb-2">
				              	{{ $modulo->modulo }}
				              	<ul class="list-unstyled">
				              		@foreach( $modulo->conteudo as $conteudo )
					              		<li>
					              			<i class="{{ $conteudo->tipoConteudo == 'video' ? 'fa fa-file-video' : 'fas fa-paperclip' }}"></i> 
							                {{ $conteudo->conteudo }}
							                <i class="fa fa-check-circle pull-right" title="{{ $conteudo->realizado($usuario->id)->count() > 0 ? 'Conteúdo Estudado' : 'Conteúdo não Estudado' }}" style="color: {{ $conteudo->realizado($usuario->id)->count() > 0 ? 'green' : '' }}"></i>	
					              		</li>
				              		@endforeach
				              	</ul>
				              </li>
				            @endforeach
				          </ul>
				        </div>
				      </div>
				    </div>
				  @endforeach
				</div>

              @else
              <div class=" col-12 alert alert-info">
                <p>Não há nenhum conteúdo no momento!</p>
              </div>
              @endif

            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <!-- /.col -->
      </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection