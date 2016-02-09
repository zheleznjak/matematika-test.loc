@extends('baselayout')

@section('content')

    {!! Html::script('js/filter.js') !!}

	<h2 class="text-center">Check language for your trip</h2>
    <div class="filter">
    {!! Form::open(array('url' => 'country','class'=>'form-inline')) !!}

	<select name="country" class="form-control country">;
    <option selected disabled hidden value=''></option>
    @foreach ($countries as $country)

   <option value="{!! $country->id !!}">{!! $country->country !!}</option>

    @endforeach
    </select>

    <select name="city" class="form-control city">;
    <option selected disabled hidden value='0'>-select country first-</option>
    </select>

    {!! Form::close() !!}
    </div>

@stop