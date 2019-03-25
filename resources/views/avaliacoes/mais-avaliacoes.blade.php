@foreach( $avaliacoes as $avaliacao )
	<p><img src="{{ Avatar::create($avaliacao->usuario->name)->toBase64() }}" alt="{{ $avaliacao->usuario->name }}" class="img-avatar-avaliation" /><strong>{{ $avaliacao->usuario->name }}</strong>
	  <input type="hidden" class="rating" value="{{ $avaliacao->nota }}" data-filled="fa fa-star" data-empty="fa fa-star-o" disabled="disabled" />
	  <br>
	  {{ $avaliacao->comentario }}
	</p>
	<hr>
@endforeach