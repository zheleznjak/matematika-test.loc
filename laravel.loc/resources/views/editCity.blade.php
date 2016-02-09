@extends('baselayout')

@section('content')

	<h2 class="text-center">Edit existing City</h2>
    <div class="center_div">
        <div style="display:none" id="alert-js" class="alert alert-danger col-sm-12"></div>
        <div style="display:none" id="success-js" class="alert alert-success col-sm-12"></div>
    {!! Html::ul($errors->all()) !!}

    {!! Form::open(array('url' => 'api/city/'.$id,'class'=>'', 'method' => 'put')) !!}

    {!! Form::hidden('id', $id, array('id' => 'invisible_city')) !!}

    <div class="form-group">
    {!! Form::label('city', 'City name', array('class' => 'form-group')) !!}
    {!! Form::text('city', $city, array('class' => 'form-control city')) !!}
    </div>

     <div class="form-group">
        <select name="country" class="form-control country">;
            @foreach ($countries as $country)
                @if ($country->id == $country_cur)
                    {{--<option type="hidden" value=""></option>--}}
                    <option selected value="{!! $country->id !!}">{!! $country->country !!}</option>
                @else
                    <option value="{!! $country->id !!}">{!! $country->country !!}</option>

                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
    <select multiple  name="language[]" class="form-control language">;
        <option selected disabled hidden value=''></option>
        @foreach ($languages as $language)
            @if (in_array($language->id, $languages_cur))
            {
            <option selected value="{!! $language->id !!}">{!! $language->language !!}</option>
            } @else {
            <option value="{!! $language->id !!}">{!! $language->language !!}</option>
            }
            @endif
        @endforeach
    </select>
    </div>

    <div class="form-group">
    {!! Form::submit('Update' , array('class' => 'btn btn-success edit-city-js')) !!}
    </div>
    {!! Form::close() !!}
    </div>
    <br>
    <br>

@stop