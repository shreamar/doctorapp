@extends('layout.main')

@section('title')
    City detail
@endsection

@section('content')
    <div class="container">
        @include('include.navbar')
        <h4>City:</h4>
        <div class="form-inline">
            <a class="btn btn-warning btn-sm"
               href="{{action('CityController@edit',['id'=>$city->id])}}"><i class="fa fa-eye"
                                                                                     aria-hidden="true"></i>
                Edit</a>
            {{--<a class="btn btn-danger btn-sm"--}}
               {{--href="{{action('CityController@destroy',['id'=>$city->id])}}"><i class="fa fa-eye"--}}
                                                                                     {{--aria-hidden="true"></i>--}}
                {{--Delete</a>--}}
            {!! Form::open(array('action' => array('CityController@destroy',$city->id),'method'=>'DELETE')) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}

            {!! Form::close() !!}
        </div>
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
            {{--{!! Form::select('hospital_id',$hospitals, null, ['class' => 'form-control','placeholder'=>'Hospitals']) !!}--}}
            @if($hospitals->count()>0)
                <select class="form-control m-bot15" name="hospital_id" placeholder="Hospitals">
                    <option value="{{null}}">Select Hospital</option>
                    @foreach($hospitals as $hospital)
                        <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                    @endforeach
                </select>


                {{ Form::hidden('city_id', $city->id) }}

                {!! Form::submit('+ Add the hospital to this city', ['class' => 'btn btn-success']) !!}
            @endif

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
                        <div class="form-inline">
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
