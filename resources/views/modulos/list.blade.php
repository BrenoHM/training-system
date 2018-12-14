@foreach( $modulos as $modulo )
  <div class="row mb-2">
    <div class="col-xs-10 col-sm-10 col-md-10">
      <input type="text" class="form-control" value="{{ $modulo->modulo }}" disabled>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
      <input type="number" value="{{ $modulo->ordem }}" class="form-control" disabled>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1 text-center">
      <button class="btn btn-danger" onclick="deleteModulos({{ $modulo->idModulo }})"><i class="fa fa-trash"></i></button>
    </div>
  </div>
@endforeach