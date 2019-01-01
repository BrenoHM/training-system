@section('css')
<link rel="stylesheet" href="{{url('/dist/plugins/rating/bootstrap-rating.css')}}">
@endsection

@section('javascript')
<script src="{{url('/dist/js/bootstrap-rating.min.js')}}"></script>
<script>
$(function(){
  $('.rating').rating();
});
</script>
@endsection