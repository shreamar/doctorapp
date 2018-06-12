@extends('layout.main')

@section('title')
    City detail
@endsection

@section('content')
    <div class="container">
        @include('include.navbar')
        <h4>City:</h4>
        <table class="table table-responsive table-striped">
            <tr>
                <td>id#:</td>
                <td>{{$city->id or null}}</td>
            </tr>
            <tr>
                <td>City:</td>
                <td>{{$city->name or null}}</td>
            </tr>
            <tr>
                <td>Country:</td>
                <td>{{$city->country or null}}</td>
            </tr>
        </table>

        <hr>

        <div class="form-inline">
            {!! Form::open(array('action' => array('CityController@addHospitalsToCity'))) !!}
            <h4>Hospitals in the city:</h4>
            {!! Form::select('hospital_id',$hospitals, null, ['class' => 'form-control','placeholder'=>'Hospitals']) !!}
            {{ Form::hidden('city_id', $city->id) }}

            {!! Form::submit('+ Add the hospital to this city', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
        <table class="table table-responsive table-striped">
            <tr>
                <th>id</th>
                <th>Hospital</th>
                <th>City</th>
                <th>Action</th>
            </tr>
            @foreach($city->hospitals as $hospital)
                <tr>
                    <td>{{$hospital->id}}</td>
                    <td>{{$hospital->name}}</td>
                    <td>{{$hospital->city->name}}</td>
                    <td>
                        <div class="row">
                            <a class="btn btn-info btn-sm"
                                href="{{action('HospitalController@show',['id'=>$hospital->id])}}"><i class="fa fa-eye"
                                                                                                      aria-hidden="true"></i>
                                View Details</a>
                            {!! Form::open(array('action' => array('CityController@removeHospitalsFromCity'))) !!}

                            {{ Form::hidden('hospital_id', $hospital->id) }}

                            {!! Form::submit('- Remove from this city', ['class' => 'btn btn-danger btn-sm']) !!}

                            {!! Form::close() !!}
                        </div>
                    </td>

                </tr>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
