@extends('layout.main')

@section('title')
    Specific Doctor
@endsection

@section('content')
    <div class="container">
        @include('include.navbar')
        <h4>Specific Doctor:</h4>
        <table class="table table-responsive table-striped">
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
                <td>{{$doctor->gender}}</td>
            </tr>
        </table>

        <h4>Related hospitals:</h4>
        <table class="table table-responsive table-striped">
            <tr>
                <th>id</th>
                <th>Hospital</th>
                <th>City</th>
            </tr>
            @foreach($doctor->hospitals as $hospital)
                <tr>
                    <td>{{$hospital->id}}</td>
                    <td>{{$hospital->name}}</td>
                    <td>{{$hospital->city->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
