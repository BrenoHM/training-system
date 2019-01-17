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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                  <a class="btn btn-success" href="{{ route('atividades.create') }}">Nova Tentativa</a>
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
                    @foreach( $tentativas as $tentativa )
                        <tr>
                          <td align="center">{{ $tentativa->idTentativa }}</td>
                          <td>{{ 'Finalizada Enviada(s) quarta, 9 Jan 2019, 16:33' }}</td>
                          <th>{{ $tentativa->nota }}</th>
                          <td><a href="{{ route('atividades.edit', $tentativa->idTentativa) }}">Revisão</a></td>
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