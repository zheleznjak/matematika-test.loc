@extends('baselayout')

@section('content')
{!! Html::script('js/city.js') !!}
	<h2 class="text-center">Cities</h2>

    <div class="center_div">
    <div style="display:none" id="alert-js" class="alert alert-danger col-sm-12"></div>
    <div style="display:none" id="success-js" class="alert alert-success col-sm-12"></div>

    </div>


@stop