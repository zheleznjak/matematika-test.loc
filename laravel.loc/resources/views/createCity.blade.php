@extends('baselayout')

@section('content')

	<h2 class="text-center">Create new City</h2>
    <div class="center_div">
        <div style="display:none" id="alert-js" class="alert alert-danger col-sm-12"></div>
        <div style="display:none" id="success-js" class="alert alert-success col-sm-12"></div>
    {!! Html::ul($errors->all(), array('class' => 'list-unstyled')) !!}

    {!! Form::open(array('url' => 'api/city','class'=>'')) !!}

    <div class="form-group">
    {!! Form::label('city', 'City name', array('class' => 'form-group')) !!}
    {!! Form::text('city', '', array('class' => 'form-control city')) !!}
    </div>

    <div class="form-group">
    <select name="country" class="form-control country">;
        @if (empty($country_id))
        <option selected disabled hidden value=''></option>
        @endif
        @foreach ($countries as $country)
            <option value="{!! $country->id !!}">{!! $country->country !!}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
    <select multiple  name="language[]" class="form-control language">;
        <option selected disabled hidden value=''></option>
        @foreach ($languages as $language)

       <option value="{!! $language->id !!}">{!! $language->language !!}</option>

        @endforeach
    </select>
    </div>

    <div class="form-group">
    {!! Form::submit('Save' , array('class' => 'btn btn-success create-city-js')) !!}
    </div>
    {!! Form::close() !!}
    </div>

@stop