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
          $("#ver-mais").hide()
        },
        success: function(data){
          $("#more").append(data.avaliacoes);
          loadRating();
          data.page == qtdPaginas ? $("#ver-mais").hide() : $("#ver-mais").show();
          $("#ver-mais").attr('data-page', data.page);
          $("#loadingMore").hide();
        }
    });
}

</script>
@endsection