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

        <h4>Related hospitals:</h4>
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
                    <td>{{$hospital->city->name}}</td>
                    <td><a class="btn btn-info btn-sm" href="{{action('HospitalController@show',['id'=>$hospital->id])}}"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
