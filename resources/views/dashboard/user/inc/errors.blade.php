{{-- @if($errors ->any())
 
 <div class="alert alert-danger ">
 
 @foreach($errors ->all() as $error )
 <p>{{$error}}</p>
  
 @endforeach
 </div>
@endif --}}
@if(Session::get('fail'))

    
                
                    <span class="text-white" style="font-weight: bold;">{{Session::get('fail')}}</span>
                  
                 
  
@endif