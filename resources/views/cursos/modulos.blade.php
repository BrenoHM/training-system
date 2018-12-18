<div id="accordion">
  @foreach( $curso->modulos as $modulo )                  
    <div class="card card-secondary">
      <div class="card-header">
        <h4 class="card-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $modulo->idModulo }}">
            {{ $modulo->modulo }}
          </a>
        </h4>
      </div>
      <div id="collapse{{ $modulo->idModulo }}" class="panel-collapse collapse in">
        <div class="card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
          3
          wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
          laborum
          eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
          nulla
          assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
          nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
          beer
          farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
          labore sustainable VHS.
        </div>
      </div>
    </div>
  @endforeach
</div>