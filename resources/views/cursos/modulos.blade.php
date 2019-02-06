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
      <div id="collapse{{ $modulo->idModulo }}" class="panel-collapse collapse {{ (!empty(app('request')->input('m')) && app('request')->input('m') == $modulo->idModulo) ? 'show' : '' }}">
        <div class="card-body">
          <ul class="list-unstyled">
            @foreach( $modulo->conteudo as $conteudo )
              <li class="mb-2">
                @php
                  $extensao = explode(".", $conteudo->url);
                @endphp
                <i class="{{ ($conteudo->tipoConteudo == 'video' || ($extensao[1] == 'mp3' || $extensao[1] == 'mp4')) ? 'fa fa-file-video' : 'fas fa-paperclip' }}"></i> 
                <a href="{{ route('conteudos.show', $conteudo->idConteudo) }}" {{ ($conteudo->tipoConteudo == 'video' || ($extensao[1] == 'mp3' || $extensao[1] == 'mp4')) ? '' : 'target="_blank"' }}>
                  {{ $conteudo->conteudo }}
                </a>
                <i class="fa fa-check-circle pull-right" title="{{ $conteudo->realizado->count() > 0 ? 'Conteúdo Estudado' : 'Conteúdo não Estudado' }}" style="color: {{ $conteudo->realizado->count() > 0 ? 'green' : '' }}"></i>
              </li>
            @endforeach
            
          </ul>

          @if( $modulo->atividade->count() )
          <hr>
            <h5>Atividades</h5>

            <ul class="list-unstyled">
              @foreach( $modulo->atividade as $atividade )
                <li class="mb-2">
                  <i class="fas fa-tasks"></i>
                  <a href="{{ route('tentativas.show', $atividade->idAtividade) }}">{{ $atividade->atividade }}</a>
                </li>
              @endforeach
            </ul>
          @endif
        </div>
      </div>
    </div>
  @endforeach
</div>