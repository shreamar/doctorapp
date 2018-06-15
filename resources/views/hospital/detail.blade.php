@extends('layout.main')

@section('title')
    Hospital detail
@endsection

@section('content')
    <div class="container">
        @include('include.navbar')
        <h4>Hospital:</h4>
        <div class="form-inline">
            <a class="btn btn-warning btn-sm"
               href="{{action('HospitalController@show',['id'=>$hospital->id])}}"><i class="fa fa-eye"
                                                                                 aria-hidden="true"></i>
                Edit</a>
            {!! Form::open(array('action' => array('HospitalController@destroy',$hospital->id),'method'=>'DELETE')) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}

            {!! Form::close() !!}
        </div>
        <table class="table table-responsive table-striped">
            <tr>
                <td>id#:</td>
                <td>{{$hospital->id}}</td>
            </tr>
            <tr>
                <td>Name:</td>
                <td>{{$hospital->name}}</td>
            </tr>
            <tr>
                <td>Location:</td>
                <td>{{$hospital->city->name or null}}</td>
            </tr>
        </table>

        <hr>

        <div class="form-inline">
            {!! Form::open(array('action' => array('HospitalController@addDoctorsToHospital'))) !!}
            <h4>Doctors working in this hospital:</h4>
            @if($doctors->count()>0)
                <select name="doctor_id" class="form-control">
                    <option value="{{null}}">Select Doctor</option>
                    @foreach($doctors as $doctor)
                        <option value="{{$doctor->id}}"> Dr. {{$doctor->firstName}} {{$doctor->lastName}}</option>
                    @endforeach
                </select>

                {{ Form::hidden('hospital_id', $hospital->id) }}

                {!! Form::submit('+ Add the doctor to this hospital', ['class' => 'btn btn-success']) !!}
            @endif

            {!! Form::close() !!}
        </div>
        <table class="table table-responsive table-striped">
            <tr>
                <th>id</th>
                <th>LastName</th>
                <th>FirstName</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
            @foreach($hospital->doctors as $doctor)
                <tr>
                    <td>{{$doctor->id}}</td>
                    <td>{{$doctor->lastName}}</td>
                    <td>{{$doctor->firstName}}</td>
                    <td>{{$doctor->age}}</td>
                    <td>
                        <div class="form-inline">
                            <a class="btn btn-info btn-sm"
                               href="{{action('DoctorController@show',['id'=>$doctor->id])}}"><i
                                        class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                            {!! Form::open(array('action' => array('HospitalController@removeDoctorsFromHospital'))) !!}

                            {{ Form::hidden('doctor_id',$doctor->id) }}
                            {{ Form::hidden('hospital_id',$hospital->id) }}

                            {!! Form::submit('- Remove from this hospital', ['class' => 'btn btn-danger btn-sm']) !!}

                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
