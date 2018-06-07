@extends('layout.main')

@section('title')
    Hospital detail
@endsection

@section('content')
    <div class="container">
        @include('include.navbar')
        <h4>Hospital:</h4>
        <table class="table table-responsive table-striped">
            <tr>
                <td>id#:</td>
                <td>{{$hospital->id}}</td>
            </tr>
            <tr>
                <td>Name:</td>
                <td>{{$hospital->name}}</td>
            </tr>
            <tr>
                <td>Location:</td>
                <td>{{$hospital->city->name}}</td>
            </tr>
        </table>

        <hr>

        <h4>Doctors working in this hospital:</h4>
        <table class="table table-responsive table-striped">
            <tr>
                <th>id</th>
                <th>LastName</th>
                <th>FirstName</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
            @foreach($hospital->doctors as $doctor)
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
