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
          <ul class="list-unstyled">
            @foreach( $modulo->conteudo as $conteudo )
              <li class="mb-2">
                <i class="{{ $conteudo->tipoConteudo == 'video' ? 'fa fa-file-video' : 'fas fa-paperclip' }}"></i> 
                <a href="#">{{ $conteudo->conteudo }}</a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  @endforeach
</div>