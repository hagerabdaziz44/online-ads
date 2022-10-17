@if($errors ->any())
 
 <div class="alert alert-primary ">
 
 @foreach($errors ->all() as $error )
 <span style="color:blue">{{$error}}</span>
  
 @endforeach
 </div>
@endif
