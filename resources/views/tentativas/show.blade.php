@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ $atividade->atividade }}</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Tentativas</li>
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
              <h3 class="box-title">Resumo das suas tentativas anteriores</h3>
              <div class="pull-right">
                <form action="{{ route('tentativas.store') }}" method="post">
                  @csrf
                  <input type="submit" value="Nova Tentativa" class="btn btn-success">
                  <input type="hidden" name="idAtividade" value="{{ $atividade->idAtividade }}">
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="text-center">Tentativa</th>
                    <th>Estado</th>
                    <th>Nota</th>
                    <th>Revisão</th>
                  </tr>
                </thead>
                <tbody>
                  @if( count($tentativas) )
                    @foreach( $tentativas as $key => $tentativa )
                        <tr>
                          <td align="center">{{ $key + 1 }}</td>
                          <td>
                            @if( $tentativa->finished_at !== null )
                              Finalizada em: <br>{{ $tentativa->finished_at->format('d/m/Y H:m:i') }}
                            @else
                              Em progresso
                            @endif
                          </td>
                          <th>{{ $tentativa->nota !== null ? $tentativa->nota : '' }}</th>
                          <td><a href="{{ route('revisao', $tentativa->idTentativa) }}">{{ $tentativa->finished_at !== null ? 'Revisão' : '' }}</a></td>
                        </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="4" align="center">Nenhuma tentativa foi realizada!</td>
                    </tr>
                  @endif
                </tbody>
                <tfoot>
                  <tr>
                    <th class="text-center">Tentativa</th>
                    <th>Estado</th>
                    <th>Nota</th>
                    <th>Revisão</th>
                  </tr>
                </tfoot>
              </table>
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