@section('css')
<link rel="stylesheet" href="/dist/plugins/rating/bootstrap-rating.css">
@endsection

@section('javascript')
<script src="/dist/js/bootstrap-rating.min.js"></script>
<script>
$(function(){
  $('.rating').rating();
});
</script>
@endsection