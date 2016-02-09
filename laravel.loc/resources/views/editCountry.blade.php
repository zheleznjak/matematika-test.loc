@extends('baselayout')

@section('content')

	<h2 class="text-center">Edit existing Country</h2>
    <div class="filter">
    {!! Html::ul($errors->all()) !!}
    <div class="center_div">
        <div style="display:none" id="alert-js" class="alert alert-danger col-sm-12"></div>
        <div style="display:none" id="success-js" class="alert alert-success col-sm-12"></div>
    {!! Form::open(array('url' => 'api/country/'.$id,'class'=>'form-inline', 'method' => 'put')) !!}

    {!! Form::hidden('id', $id, array('id' => 'invisible_country')) !!}

    <div class="form-group">
    {!! Form::label('country', 'Country name', array('class' => 'form-group')) !!}
    {!! Form::text('country', $country, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
    {!! Form::submit('Update' , array('class' => 'btn btn-success edit-country-js')) !!}
    </div>
    {!! Form::close() !!}
    </div>
    </div>
@stop