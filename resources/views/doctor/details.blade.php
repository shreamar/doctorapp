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
                <th>id</th>
                <th>LastName</th>
                <th>FirstName</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
            {{--@foreach($doctors as $doctor)
                <tr>
                    <td>{{$doctor->id}}</td>
                    <td>{{$doctor->lastName}}</td>
                    <td>{{$doctor->firstName}}</td>
                    <td>{{$doctor->gender}}</td>
                    <td>{{$doctor->age}}</td>
                    <td><a class="btn btn-info btn-xs" href="{{route('doctor.details',$doctor->i1d)}}"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a></td>
                </tr>
            @endforeach--}}
        </table>
    </div>
@endsection
