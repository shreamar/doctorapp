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
                <td>{{$city->id}}</td>
            </tr>
            <tr>
                <td>City:</td>
                <td>{{$city->name}}</td>
            </tr>
            <tr>
                <td>Country:</td>
                <td>{{$city->country}}</td>
            </tr>
        </table>

        <hr>

        <h4>Hospitals in the city:</h4>
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
                    <td><a class="btn btn-info btn-sm" href="{{action('HospitalController@show',['id'=>$hospital->id])}}"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a></td>
                </tr>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
