@if($errors ->any())
 
 
 
 @foreach($errors ->all() as $error )
 
 <h5 style="color: red ; font-family: Verdana, Geneva, Tahoma, sans-serif;">{{$error}}</h5>
 @endforeach

@endif