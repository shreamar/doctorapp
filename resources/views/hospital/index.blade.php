@extends('layout.main')

@section('title')
    Hospitals
@endsection

@section('content')
    <div class="container">
        @include('include.navbar')
        <table class="table table-responsive table-striped">
            <tr>
                <th>id</th>
                <th>Hospital</th>
                <th>City</th>
            </tr>
            @foreach($hospitals as $hospital)
                <tr>
                    <td>{{$hospital->id}}</td>
                    <td>{{$hospital->name}}</td>
                    <td>{{$hospital->city->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
