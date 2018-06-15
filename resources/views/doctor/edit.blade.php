@extends('layout.main')
@section('title')
    Update Doctor
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
        <h4>Update Doctor</h4>
        {!! Form::open(array('action' => array('DoctorController@update',$doctor->id),'method'=>'PUT')) !!}

        <div class="form-group">
            {!! Form::label('firstName', 'Firstname') !!}
            {!! Form::text('firstName', $doctor->firstName, ['class' => 'form-control','placeholder'=>'Firstname']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('lastName', 'Lastname') !!}
            {!! Form::text('lastName', $doctor->lastName, ['class' => 'form-control','placeholder'=>'Lastname']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('age', 'Age') !!}
            {!! Form::number('age', $doctor->age, ['class' => 'form-control','placeholder'=>'Age']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('gender', 'Male') !!}
            {!! Form::radio('gender', 0, $doctor->gender==0,['class' => 'form-control']) !!}

            {!! Form::label('gender', 'Female') !!}
            {!! Form::radio('gender', 1, $doctor->gender==1,['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Update', ['class' => 'btn btn-info']) !!}

        {!! Form::close() !!}
    </div>
@endsection