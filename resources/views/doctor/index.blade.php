/**
* Created by PhpStorm.
* User: ashrestha
* Date: 6/5/2018
* Time: 3:47 PM
*/
<hr>
<hr>
Hospitals and doctors working there:
<br><br><br>
@foreach($hospitals as $hospital)
    > {{$hospital->name}} hospital:
    <br>
    @foreach($hospital->doctors as $doctor)
        - {{$doctor->firstName}} {{$doctor->lastName}}
        <br>
    @endforeach
    <hr>
@endforeach
<br>
<hr>
<hr>
Doctors working in different hospitals:
<br>
@foreach($doctors as $doctor)
    > {{$doctor->firstName}} {{$doctor->lastName}} works in following hospitals:<br>
    @foreach($doctor->hospitals as $hospital)
        - {{$hospital->name}}
        <br>
    @endforeach
    <hr>
@endforeach
