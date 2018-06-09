@extends('layout.main')

@section('title')
    Doctors
@endsection

@section('content')
    <div class="container">
        @include('include.navbar')
        <br>
        <div>
            <h4>Doctors:</h4></th>
            <a class="btn btn-info btn-sm"
               href="{{action('DoctorController@create')}}">
                <i class="fa fa-eye" aria-hidden="true"></i> New Doctor</a>
        </div>
        <table class="table table-responsive table-striped">
            <tr>
                <th>id</th>
                <th>LastName</th>
                <th>FirstName</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
            @foreach($doctors as $doctor)
                <tr>
                    <td>{{$doctor->id}}</td>
                    <td>{{$doctor->lastName}}</td>
                    <td>{{$doctor->firstName}}</td>
                    <td>{{$doctor->age}}</td>
                    <td><a class="btn btn-info btn-sm" href="{{action('DoctorController@show',['id'=>$doctor->id])}}"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
