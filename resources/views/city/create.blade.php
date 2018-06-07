@extends('layout.main')
@section('title')
    Create City
@endsection
@section('content')
    <div class="container">
        <br>
        <h4>Create City</h4>
        {!! Form::open(array('action' => array('CityController@create'))) !!}

        <div class="form-group">
            {!! Form::label('name', 'City') !!}
            {!! Form::text('name', 'My City', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('country', 'Country') !!}
            {!! Form::text('country', 'My Country', ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}

        {!! Form::close() !!}
    </div>
@endsection