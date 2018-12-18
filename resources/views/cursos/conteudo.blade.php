<ol>
    @foreach( $curso->modulos as $modulo )
      <li>{{ $modulo->modulo }}
        <ol>
          <li>Phasellus iaculis neque</li>
          <li>Purus sodales ultricies</li>
          <li>Vestibulum laoreet porttitor sem</li>
          <li>Ac tristique libero volutpat at</li>
        </ol>
      </li>
    @endforeach
</ol>