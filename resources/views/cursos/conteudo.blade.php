<ol>
    @foreach( $curso->modulos as $modulo )
      <li>{{ $modulo->modulo }}
        <ol>
          @foreach( $modulo->conteudo as $conteudo )
            <li>{{ $conteudo->conteudo }}</li>
          @endforeach
        </ol>
      </li>
    @endforeach
</ol>