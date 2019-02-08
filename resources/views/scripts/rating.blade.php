@section('css')
<link rel="stylesheet" href="{{url('/dist/plugins/rating/bootstrap-rating.css')}}">
@endsection

@section('javascript')
<script src="{{url('/dist/js/bootstrap-rating.min.js')}}"></script>
<script>
$(function(){
  loadRating();
});

function loadRating(){
	$('.rating').rating();
}

function carregarMais(obj, idCurso, qtdPaginas) {

	var objeto = $(obj);
    var page   = objeto.attr('data-page');

    $.ajax({ 
        url: "{{route('avaliacoes.mais')}}",
        data: {page: page, idCurso: idCurso},
        dataType: "json",
        type: "POST",
        beforeSend: function(){
          $("#loadingMore").show();
        },
        success: function(data){
          var avaliacao = "";
          $.each(data.avaliacoes, function(i, value){
            avaliacao = `
              <p><strong>${data.avaliacoes[i].usuario.name}</strong>
                <input type="hidden" class="rating" value="${data.avaliacoes[i].nota}" data-filled="fa fa-star" data-empty="fa fa-star-o" disabled="disabled" />
                <br>
                ${data.avaliacoes[i].comentario}
              </p>
              <hr>
            `;
            $("#more").append(avaliacao);
            loadRating();
          });
          $("#ver-mais").attr('data-page', data.page);
          if( data.page ==  qtdPaginas) {
          	$("#ver-mais").hide();
          }
          $("#loadingMore").hide();
        }
    });
}

</script>
@endsection