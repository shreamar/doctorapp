
/**
 * Created by PhpStorm.
 * User: ashrestha
 * Date: 6/5/2018
 * Time: 3:47 PM
 */
<hr>
Cities with hospitals:<br>
@foreach($cities as $city)
    + {{$city->name}}
    <br>
@endforeach
