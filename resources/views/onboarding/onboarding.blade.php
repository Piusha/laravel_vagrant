@extends('layout.onbordinglayout')
@section('content')

    <div class="chart_wrapper"></div>
@endsection


@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="application/javascript" src="/js/onboarding.js"></script>
    <script type="application/javascript">
        $('.chart_wrapper').weeklyCohortChart();
    </script>


@endsection