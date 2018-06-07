@extends('layout.main')

@section('title')
    Cities
@endsection

@section('content')
    <div class="container">
        @include('include.navbar')
        <br><h4>Cities:</h4>
        <table class="table table-responsive table-striped">
            <tr>
                <th>id</th>
                <th>City</th>
                <th>Country</th>
                <th>Action</th>
            </tr>
            @foreach($cities as $city)
                <tr>
                    <td>{{$city->id}}</td>
                    <td>{{$city->name}}</td>
                    <td>{{$city->country}}</td>
                    <td><a class="btn btn-info btn-sm" href="{{action('CityController@show',['id'=>$city->id])}}"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
