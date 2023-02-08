@extends('layouts.app')

@section('content')
@push('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  var data =  {{ Js::from($result) }};
</script>
<script type="text/javascript" src="{{ asset('js/bubble.chart.js') }}"></script>
@endpush
<div class="container">
    <div id="chart_div" style="width: 100%; height: 900px;"></div>
</div>
@endsection