@extends('layout.main')

@section('title')
    Cities
@endsection

@section('content')
    <div class="container">
        @include('include.navbar')
        <br>
        <div>
            <h4>Cities:</h4></th>
            <a class="btn btn-info btn-sm"
               href="{{action('CityController@create')}}">
                <i class="fa fa-eye" aria-hidden="true"></i> New City</a>
        </div>

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
                    <td><a class="btn btn-info btn-sm" href="{{action('CityController@show',['id'=>$city->id])}}"><i
                                    class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                        <a class="btn btn-success btn-sm" href="{{action('CityController@edit',['id'=>$city->id])}}"><i
                                    class="fa fa-eye" aria-hidden="true"></i> Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>

        {{$cities->links()}}
    </div>
@endsection
