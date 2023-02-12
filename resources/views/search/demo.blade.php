@extends('layouts.app')

@section('content')
@push('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="{{ asset('js/demo.chart.js') }}"></script>
@endpush
<div class="container">
    <h2>Demo</h2>
    <canvas id="chart_div" height="300" width="0"></canvas>
</div>
@endsection