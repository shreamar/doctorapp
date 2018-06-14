@extends('layout.main')

@section('title')
    Doctor detail
@endsection

@section('content')
    <div class="container">
        @include('include.navbar')
        <h4>Doctor:</h4>
        <table class="table table-responsive table-striped">
            <tr>
                <td>ID:</td>
                <td>{{$doctor->id}}</td>
            </tr>
            <tr>
                <td>Name:</td>
                <td>{{$doctor->firstName}} {{$doctor->lastName}}</td>
            </tr>
            <tr>
                <td>Age:</td>
                <td>{{$doctor->age}}</td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>@if($doctor->gender)
                        Female
                    @else
                        Male
                    @endif
                </td>
            </tr>
        </table>

        <div class="form-inline">
            {!! Form::open(array('action' => array('DoctorController@addHospitalsToDoctor'))) !!}
            <h4>Hospitals where this doctor works:</h4>
            {!! Form::select('hospital_id',$hospitals, null, ['class' => 'form-control','placeholder'=>'Hospitals']) !!}
            {{ Form::hidden('doctor_id', $doctor->id) }}

            {!! Form::submit('+ Add the hospital to this doctor', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>

        <table class="table table-responsive table-striped">
            <tr>
                <th>id</th>
                <th>Hospital</th>
                <th>City</th>
                <th>Action</th>
            </tr>
            @foreach($doctor->hospitals as $hospital)
                <tr>
                    <td>{{$hospital->id}}</td>
                    <td>{{$hospital->name}}</td>
                    <td>{{$hospital->city->name or null}}</td>
                    <td>
                        <div class="form-inline">
                        <a class="btn btn-info btn-sm"
                           href="{{action('HospitalController@show',['id'=>$hospital->id])}}"><i class="fa fa-eye"
                                                                                                 aria-hidden="true"></i>
                            View Details</a>
                            {!! Form::open(array('action' => array('DoctorController@removeHospitalsFromDoctor'))) !!}

                            {{ Form::hidden('doctor_id',$doctor->id) }}
                            {{ Form::hidden('hospital_id',$hospital->id) }}

                            {!! Form::submit('- Remove from this doctor', ['class' => 'btn btn-danger btn-sm']) !!}

                            {!! Form::close() !!}
                        </div>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
@endsection
