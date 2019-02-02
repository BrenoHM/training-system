@extends('layouts.master') 
@section('content')
<div class="content-wrapper">
     
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1 class="m-0 text-dark">Minhas Anotações</h1>-->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Minhas Anotações</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="box-title">Minhas Anotações</h3>
              </div>
              
              <div class="card-body">
                <div class="row">
                  @foreach( $anotacoes as $anotacao )
                    <div class="col-lg-4">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h4>{{ $anotacao->conteudo->modulo->curso->curso }}</h4>
                                <h5>{{ $anotacao->conteudo->modulo->modulo }}</h5>
                                <p>{{ $anotacao->conteudo->conteudo }}</p>
                                <p>{{ $anotacao->anotacao }}</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-sticky-note"></i>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
</div>
@endsection