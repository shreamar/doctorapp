@extends('layout.main')

@section('title')
    Hospitals
@endsection

@section('content')
    <div class="container">
        @include('include.navbar')
        <br>
        <div>
            <h4>Hospitals:</h4></th>
            <a class="btn btn-info btn-sm"
               href="{{action('HospitalController@create')}}">
                <i class="fa fa-eye" aria-hidden="true"></i> New Hospital</a>
        </div>
        <table class="table table-responsive table-striped">
            <tr>
                <th>id</th>
                <th>Hospital</th>
                <th>City</th>
                <th>Action</th>
            </tr>
            @foreach($hospitals as $hospital)
                <tr>
                    <td>{{$hospital->id}}</td>
                    <td>{{$hospital->name}}</td>
                    <td>{{$hospital->city->name or null}}</td> {{-- ~ ($hospital->city->name) ? (1$hospital->city->name) : null--}}
                    <td>
                        <a class="btn btn-info btn-sm" href="{{action('HospitalController@show',['id'=>$hospital->id])}}">
                            <i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                        <a class="btn btn-success btn-sm" href="{{action('HospitalController@edit',['id'=>$hospital->id])}}">
                            <i class="fa fa-eye" aria-hidden="true"></i> Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
