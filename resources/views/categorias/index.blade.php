@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categorias de Cursos</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Categorias</li>
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
                  <a class="btn btn-success" href="{{ route('categorias.create') }}">Nova</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              @include('layouts.mensagens')
              <div class="table-responsive">
                <table class="table table-bordered table-striped dataTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Categoria</th>
                      <th data-orderable="false">Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach( $categorias as $categoria )
                          <tr>
                            <td>{{ $categoria->idCategoria }}</td>
                            <td>{{ $categoria->categoria }}</td>
                            <td nowrap>
                                <form action="{{ route('categorias.destroy', $categoria->idCategoria) }}" method="POST" class="form-action-inline">
                                    <a class="btn btn-primary" href="{{ route('categorias.edit', $categoria->idCategoria) }}"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este registro?');"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                          </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Categoria</th>
                      <th>Ação</th>
                    </tr>
                  </tfoot>
                </table>
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