@extends('baselayout')

@section('content')

	<h2 class="text-center">Edit existing Language</h2>
    <div class="center_div">
        <div style="display:none" id="alert-js" class="alert alert-danger col-sm-12"></div>
        <div style="display:none" id="success-js" class="alert alert-success col-sm-12"></div>
    {!! Html::ul($errors->all()) !!}

    {!! Form::open(array('url' => 'api/language/'.$id,'class'=>'form-inline', 'method' => 'put')) !!}

    {!! Form::hidden('id', $id, array('id' => 'invisible_city')) !!}

    <div class="form-group">
    {!! Form::label('language', 'Language name', array('class' => 'form-group')) !!}
    {!! Form::text('language', $language, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
    {!! Form::submit('Update' , array('class' => 'btn btn-success edit-language-js')) !!}
    </div>
    {!! Form::close() !!}
    </div>
@stop