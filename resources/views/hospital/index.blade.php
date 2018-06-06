/**
* Created by PhpStorm.
* User: ashrestha
* Date: 6/5/2018
* Time: 3:47 PM
*/
<hr>
@foreach($hospitals as $hospital)
    {{$hospital->name}} hospital is located in {{$hospital->city->name}}
    <br><br>
@endforeach