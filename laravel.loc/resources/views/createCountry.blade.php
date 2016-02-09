@extends('baselayout')

@section('content')

	<h2 class="text-center">Create new Country</h2>

    <div class="center_div">
        <div style="display:none" id="alert-js" class="alert alert-danger col-sm-12"></div>
        <div style="display:none" id="success-js" class="alert alert-success col-sm-12"></div>
    <div class="filter">

    {!! Html::ul($errors->all(), array('class' => 'text-center list-unstyled')) !!}

    {!! Form::open(array('url' => 'api/country','class'=>'form-inline')) !!}

    <div class="form-group">
    {!! Form::label('country', 'Country name', array('class' => 'form-group')) !!}
    {!! Form::text('country', '', array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
    {!! Form::submit('Save' , array('class' => 'btn btn-success create-country-js')) !!}
    </div>
    {!! Form::close() !!}
    </div>
    </div>
@stop