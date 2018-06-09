@extends('layout.main')
@section('title')
    Create Hospital
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
        <h4>Create Hospital</h4>
        {!! Form::open(array('action' => array('HospitalController@store'))) !!}

        <div class="form-group">
            {!! Form::label('name', 'Hospital*') !!}
            {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Hospital Name']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('city', 'City') !!}
            {!! Form::select('city_id',$cities, null, ['class' => 'form-control','placeholder'=>'Select City']) !!}
        </div>

        {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}

        {!! Form::close() !!}
    </div>
@endsection