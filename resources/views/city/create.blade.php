@extends('layout.main')
@section('title')
    Create City
@endsection
@section('content')
    <div class="container">
        @include('include.navbar')
        <br>
        @if($errors->any())
            @foreach($errors->all() as $message)
                <h5 class="alert alert-danger">{{$message}}</h5>
            @endforeach
        @endif
        <h4>Create City</h4>
        {!! Form::open(array('action' => array('CityController@store'))) !!}

        <div class="form-group">
            {!! Form::label('name', 'City') !!}
            {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'My City']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('country', 'Country') !!}
            {!! Form::text('country', null, ['class' => 'form-control','placeholder'=>'My Country']) !!}
        </div>

        {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}

        {!! Form::close() !!}
    </div>
@endsection