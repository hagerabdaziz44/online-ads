
  

@extends('dashboard.admin.layout')
@section('content')
<div class="right_col" role="main">
  <div class="">
    
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add new price</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form  method="POST" action="{{route('admin.auction.amount.store')}}" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
              @csrf
              
            

              <div class="row">
                
                   <div  class=" col-md-12">
                
               
                <label  >user
                </label>
               
                  <select class="form-control" name="user_id">
                    
                      <option selected>Select User</option>
                      @foreach ($users as $user)
                      <option value="{{$user->id}}">{{$user->email}}</option> 
                      @endforeach
                    
                  </select>
              
               
                  
                </div>
                <div  class=" col-md-12">
                
                    <br>
                    <label  >user
                    </label>
                   
                      <select class="form-control" name="auction_id">
                        
                          <option selected>Select Auction</option>
                          @foreach ($auction as $au)
                          <option value="{{$au->id}}">{{$au->name}}</option> 
                          @endforeach
                        
                      </select>
                  
                   
                      
                    </div>
                  <div  class=" col-md-12">
                    <br>
                    <label  >minimum price</span>
                    </label>
                    <div >
                      <input type="text" required="required" class="form-control " name="price" placeholder=" price">
                    </div>
                  </div>
                 
                  
                
            
                  
                

              
              
                <div class="ln_solid"></div>
                <div class="form-group">
                  <br>
                
                  <div class="col-md-12 ">
                    <button type="submit" class="btn btn-primary">submit</button>
                    
                  </div>
                </div>
              
              
           
              
              
              
              </div>
              
              

            </form>
          </div>
        </div>
      </div>
    </div>

   

    


    
  </div>
</div>

@endsection
