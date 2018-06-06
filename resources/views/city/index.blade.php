@extends('layout.main')

@section('title')
    City
@endsection

@section('content')
    <div class="container">
        @include('include.navbar')
        <table class="table table-responsive table-striped">
            <tr>
                <th>id</th>
                <th>City</th>
                <th>Country</th>
                <th>Added to system at</th>
            </tr>
            @foreach($cities as $city)
                <tr>
                    <td>{{$city->id}}</td>
                    <td>{{$city->name}}</td>
                    <td>{{$city->country}}</td>
                    <td>{{$city->created_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
