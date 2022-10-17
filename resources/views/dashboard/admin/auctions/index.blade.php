


@extends('dashboard.admin.layout')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
          <div class="input-group">
            <input id="keyword" type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>

      

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>All Auctions </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
             
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Auction Name</th>
                    <th>Description</th>
                    <th>start_date</th>
                    <th>end_date</th>
                    <th>minimum_price</th>
                    <th>cover photo</th>
                    <th>condition</th>
                    <th>Is_active</th>
                    <th>Status</th>
                    <th>Actions</th>
                    
                  </tr>
                </thead>


                <tbody id="allauctions">
                    {{-- @foreach ($auction as $auc)
                  <tr>
                    <td>{{$auc->id}}</td> 
                   
                    <td>{{$auc->user->first_name .$auc->user->last_name  }}</td>
                    <td>{{$auc->name}}</td>
                    <td>{{$auc->desc}}</td>
                    <td>{{$auc->start_date }}</td>
                    <td>{{$auc->end_date }}</td>
                    <td>{{$auc->min_price}}</td>
                    <td> <img src="{{asset("Uploads/Auctions/$auc->img")}}" alt=""  height="40px" ></td>
                    <td>{{$auc->condition}}</td>

                    <td>
                      
                      <button type="button"  class="edit_btn btn btn-info  btn-xs fa fa-pencil" value="{{$auc->id}}" >Edit</button>
                     
                      <a  class="btn btn-danger fa fa-trash-o" href="{{route('admin.auction.delete', $auc->id )}}">Delete</a>
                      <a  class="btn btn-primary btn-xs fa fa-folder" href="{{route('admin.auction.bidders_info', $auc->id )}}">Info</a>
                    
                    </td>
                  </tr>
                  @endforeach --}}
              
                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>
          </div>
        </div>

       

        

        


       
      </div>
    </div>
  </div>
{{-- pop up edit --}}
<div class="modal fade" id="EditEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="row">
        <div class="container">
        <div class="col-md-12 mb-5 ">
         
          <div class="modal-body ">
            @include('dashboard.admin.inc.errors') 
        <form id="UpdateModal" method="POST"    data-parsley-validate class="form-horizontal form-label-left">
          
          @csrf
          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
          <div class="row">
          <div  class=" col-md-6">
            <input type="hidden" name="id" id="auction_id"    > 
              <ul class="alert alert-warning d-none" id="updateerrors"> </ul>
            <label  >Name</span>
            </label>
            <div >
              <input type="text" required="required" class="form-control " name="name" id="name">
            </div>
          </div>
          <div  class=" col-md-6">
            <label  >description</span>
            </label>
            <div >
              <input type="text" required="required" class="form-control " name="desc" id="desc">
            </div>
          </div>
        

         
            
               <div  class=" col-md-6">
            
            <br>
            <label  >user
            </label>
         
            <select class="form-control" name="user_id"    >
                  
                  
              <option selected class="t_dn"  id="userid"> </option>

                @foreach ($users as $us)
                
                  <option  value="{{$us->id}}">{{$us->email}}</option> 
                  @endforeach
              
            </select>
        
           
              
            </div>
              <div  class=" col-md-6">
                <br>
                <label  >minimum price</span>
                </label>
                <div >
                  <input type="text" required="required" placeholder="2022-08-14 17:36:13" class="form-control " name="min_price" id="min_price">
                </div>
              </div>
              <div  class=" col-md-6">
                <br>
                <label  >Start date
                </label>
                
                  <input  class="form-control " placeholder="2022-08-14 17:36:13" aria-describedby="inputSuccess2Status" name='start_date' id="start_date" >
                  {{-- <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span> --}}
                  {{-- <span id="inputSuccess2Status" class="sr-only">(success)</span> --}}
                
                
                 
              
               
          
                </div>
                <div  class=" col-md-6 ">
                  <br>
                  <label  >End date
                  </label>
                 
                    <input  class="form-control"   aria-describedby="inputSuccess2Status" name='end_date' id="end_date">
                   
                  
                   
                
                 
                    
                  </div>

              <div  class=" col-md-6">
            <br>
            
                <label  >Condition</span>
                </label>
                <br>
                <select class="form-control" name='condition'>    

                     
                  <option  selected  id="condition" ></option> 

                  <option   > New</option> 
                  <option   >Used</option> 
                  
                </select>
    
                
              </div>
              <div  class=" col-md-6 ">
                <br>
                <label  >Address
                </label>
               
                  <input  class="form-control"   aria-describedby="inputSuccess2Status" name='address' id="address">
                 
                
                 
              
               
                  
                </div>
             
              
              <div class=" col-md-6 ">
                <br>
                
                
                <div class="input-group  ">

                  <input class="form-control" type="file"  name=img id="img">

                  <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
              </div>
            </div>
            <div class=" col-md-6 ">
              <br>
            <div id="allphotos" class="photos">
              
            
            </div>
          </div>
            <div class=" col-md-6 ">
              <br>
              <div class="input-group  ">

                <input class="form-control " type="file" id="formFile"   name="imgs[]"
                 
                accept="image/*"
                multiple>

                <label class="input-group-text" for="inputGroupFile02">Upload all Images</label>
            </div>
          </div>
          
        
              
            


            
            <div class="ln_solid"></div>
            <div class="form-group">
              <br>
              
              <div class="col-md-6 ">
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
</div>

{{-- end pop up edit --}}
{{-- pop up info --}}
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="row">
        <div class="container">
        <div class="col-md-12 mb-5 ">
         
          <div class="modal-body ">
            @include('dashboard.admin.inc.errors') 
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Auction ID</th>
                  <th>User Name</th>
                  <th>User photo</th>
                  <th>Auction Name</th>
                  <th>cover photo</th>
                  <th>Price</th>
                  <th>phone</th>
                  
                  
                  
                </tr>
              </thead>


              <tbody class="info" id="info">
             
              </tbody>
            </table>
      </div>
    </div>
    </div>
  </div>
</div>
  </div>
</div>

{{-- end pop up edit --}}



 @endsection
 @section('scripts')
 <script>
$(document).ready(function(){
  //fetchauction
  fetchauction();
  function fetchauction() {
    $.ajax({
        type: "GET",
        url: "fetch-auction",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            $('tbody').html("");
            $.each(response.auction, function (key, item) {
              var active;
              var accept;
              if(item.is_active == 1)
              {
                active='Active'
              }
              else
              {
                active='InActive'
              }
              if(item.is_accepted == 1)
              {
                accept='Accepted'
              }
              else
              {
                accept='Pendding'
              }

                $('#allauctions').append(`<tr>\
                  <td>` + item.id + `</td>\
                  <td> `+ item.user.first_name +`</td>\
                    <td>` + item.name + `</td>\
                    <td>` + item.desc + `</td>\
                    <td>` + item.start_date + `</td>\
                    <td>` + item.end_date + `</td>\
                    <td>` + item.min_price + `</td>\
                    <td> <img src="{{asset("Uploads/Auctions/`+item.img+`")}}" alt=""  height="40px" ></td>\
                    <td>` + item.condition + `</td>\
                   
                    
                    
                    <td>` + active + `</td>\
                    <td>` + accept + `</td>\
                    /<td>
                      
                      <button type="button" value="` + item.id + `" class="edit_btn btn btn-info  btn-xs fa fa-pencil"> Edit</button>\
                      <button value="` + item.id + `"class=" info_btn  btn btn-primary btn-xs fa fa-folder" >Info</button>\
                     <button type="button" value="` + item.id + `" class="delete_btn btn btn-danger delete_btn fa fa-trash-o "> Delete</button></td>\
                    
                     

                </tr>`);
            });
        }
    });
  }
  //end fetchauction
  // $('#datatable').DataTable();
 
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
});
//info

// end get method
// get method
$(document).on('click','.edit_btn',function(e)
{
e.preventDefault();
var auction_id=$(this).val();
$('#EditEmployeeModal').modal('show');

$.ajax(
  {
   type:"GET",
   
  url:"edit/"+auction_id,
  success: function (response)
  {
    if(response.status==404)
    {
      alert(response.message);
      $('#EditEmployeeModal').modal('hide');
    }
    else
    {
      $('#auction_id').val(response.auction.id);
      $('#name').val(response.auction.name);
      $('#desc').val(response.auction.desc);
      $('#min_price').val(response.auction.min_price);
      $('#start_date').val(response.auction.start_date);
      $('#address').val(response.auction.address);
      $('#end_date').val(response.auction.end_date);
     
      
      $('#condition').html("");
     $('#condition').val(response.auction.id);
      $('#condition').append(`
      
      `+response.auction.condition+``);
      $('#is_active').html("");
      $('#is_active').removeClass('active');

      if(response.auction.is_active ==1)
      {
        $('#is_active').append(`
       
          <label class="form-check-label  fs-2" for="flexCheckDefault" style="font-size:20px">
                        Active
                      </label>
        <input type="checkbox" value="1" name="is_active"
           id="switcheryColor4" class="switchery" data-color="success"
                 checked  />`)
       
                
      }
      else
      {
        $('#is_active').append(`
        <lable class="form-check-label  fs-2" for="flexCheckDefault" style="font-size:20px">Is_Active<label>
        <input type="checkbox" value="1" name="is_active"
           id="switcheryColor4" class="switchery" data-color="success"
                 />`)
       
                
      }
      $('#is_accepted').html("");
      $('#is_accepted').removeClass('accept');
      if(response.auction.is_accepted==1)
      {
        $('#is_accepted').append(`
       
          <label class="form-check-label  fs-2" for="flexCheckDefault" style="font-size:20px">
                       Is_accepted
                      </label>
        <input type="checkbox" value="1" name="is_accepted"
           id="switcheryColor4" class="switchery" data-color="success"
                 checked  />`)
       
                
      }
      else
      {
        $('#is_accepted').append(`
        <lable class="form-check-label  fs-2" for="flexCheckDefault" style="font-size:20px">Is_Accepted<label>
        <input type="checkbox" value="1" name="is_accepted"
           id="switcheryColor4" class="switchery" data-color="success"
                 />`)
       
                
      }
     
      
      
      $('#userid').html("");
      $('#userid').removeClass('t_dn');
      $.each(response.users, function (key, users) { 

         $('#userid').val(users.id);
         $('#userid').append(``+users.email+` `);
         console.log(users.email)
         
      });

      $('#allphotos').html("");
      $('#allphotos').removeClass('photos');
      
  $.each(response.images, function (key, images) { 
                      console.log(images)
							$('#allphotos').append(`
                
          <button id="delete"  value="`+images.id+`" ">x</button>
                  <br>
      <img class=" containerfluid" src="{{asset("Uploads/auctions/`+images.image+`")}}" alt=""  height="40px" >`
               
      );
      document.getElementById("delete").onclick = function () {

      location.href="deleteimage/"+images.id
};

						});
      
      
   

    
  
    
  }
 
}
})})
// end get method
//post update
$(document).on('submit','#UpdateModal',function(e)
{
e.preventDefault();

var id=$('#auction_id').val();


var xhr = new XMLHttpRequest(),
    method = "POST",
    url="update/"+id;

xhr.open(method, url, true);
xhr.onreadystatechange = function () {
  if(xhr.readyState === XMLHttpRequest.DONE) {
    var status = xhr.status;
    if (status === 0 || (status >= 200 && status < 400)) {
      // The request has been completed successfully
      console.log(xhr.responseText);
    } 
}};

// var formData = new FormData();
// formData.append("_token", document.querySelector("meta[name=_token]").content);



// var data = {

//                "_token": $('#token').val(),
//                 'title': $('#title').val(),
//                 'desc': $('#desc').val(),
//                 'category_id': $('#category_id').val(),
//                 'user_id': $('#user_id').val(),
//                 'condition': $('#condition').val(),
//                 'price': $('#price').val(),
//                 'img': $('#img').val(),
                    

//               }
//               console.log(data);
           
              
 let edit =new FormData($('#UpdateModal')[0]);         
// var data={
//   'id': $('#ad_id').val(),
// "_token": $('#token').val(),
//  'title': $('#title').val(),
 
//  'desc': $('#desc').val(),
//  'category_id': $('#category_id').val(),
//  'user_id': $('#user_id').val(),
//  'condition': $('#condition').val(),
//  'price': $('#price').val(),
 

// };
// console.log(data);


$.ajax(
  {
  
  
   type:"POST",
   
  url:"update/"+id,
  enctype:"multipart/form-data",
  data:edit,
 
  
  dataType: "json",
  
  
  contentType:false,
  processData:false,

  success: function (data){
  
  

  if (data.status==400)
  {
   
    $('#updateerrors').html("");
    $('#updateerrors').removeClass('d-none');
    $.each(data.errors,function(key,err_value)
    {
      $('#updateerrors').append(`<li>`+err_value+`</li>`);
    });
  }
  else if (data.status==404)
  {
    alert(data.message);

  }
  else if(data.status==200)
  {
 $('#EditEmployeeModal').modal('hide');
 fetchauction();
 alert(data.message);
  }
  

},
error: function (xhr) {
        console.log(xhr.responseText);
    }



})})
//end post update
  //  real time 
  $('#keyword').keyup(function()
 {
     let keyword=$(this).val()
     let url ="{{route('admin.auction.search')}}"+"?keyword="+keyword
     console.log(url);
 
     $.ajax(
         {
             type:"GET",
             url:url,
             contentType:false,
             processData:false,
             success: function ( data)
              {
                 $('#allauctions').empty()
                 
                
                
                 for (auction of data){
                  var active;
              var accept;
              if(data.is_active == 1)
              {
                active='Active'
              }
              else
              {
                active='InActive'
              }
              if(data.is_accepted == 1)
              {
                accept='Accepted'
              }
              else
              {
                accept='Pendding'
              }
                     $('#allauctions').append(
 
                     `
                   
                  
                    
                     
                                     
                    <tr>
                    <td>${auction.id}</td> 
                    <td>${auction.user.first_name }</td>
                   
                    <td>${auction.name}</td>
                    <td>${auction.desc}</td>
                    <td>${auction.start_date}</td>
                    <td>${auction.end_date}</td>
                   
                    <td>${auction.min_price}</td>
                    <td> <img src="{{asset("Uploads/auctions/`+auction.img+`")}}" alt=""  height="40px" ></td> 
                    <td>${auction.condition}</td>
                    <td>${active}</td>
                    <td>${ accept}</td>
                    <td><button id="myButton2"  type="button" value="`+auction.id+`" class="edit_btn btn btn-info  fa fa-pencil">Edit</button>
                      <button id="myButton3"  type="button" value="`+auction.id+`" class="edit_btn btn btn-primary btn-xs fa fa-folder ">Info</button>
                    <button id="myButton"  type="button" value="`+auction.id+`" class="edit_btn btn btn-danger fa fa-trash-o">Deletet</button>
                   
                    </td>
                   
                   
 
                   
                 
                </tr>
                  
                
              
                
                
              
            
         
               
                    
                    
                     
                     
                    
                  
                    
     
 
                     `
             
 
                 )
 
             } 
  //delete
 document.getElementById("myButton").onclick = function () {

location.href="delete/"+ auction.id
};
//edit
document.getElementById("myButton2").onclick = function () {

location.href="edit/"+ auction.id
};
//info
document.getElementById("myButton3").onclick = function () {

location.href="bidders/"+ auction.id
};
            
            
            }
         }
     )
 })

 $(document).on('click','.info_btn',function(e)
{
e.preventDefault();
var info_id=$(this).val();
$('#infoModal').modal('show');

$.ajax(
  {
   type:"GET",
   
  url:"bidders/"+info_id,
  success: function (response)
  {
  
   console.log(response.inf)
   $.each(response.inf, function (key, response) {
              var active;
              $('#info').empty()
                    $('#info').append(`<tr>\
                  <td>` + response.id + `</td>\
                  
                    <td>` + response.user.first_name + `</td>\
                    <td> <img src="{{asset("Uploads/users/`+response.user.img+`")}}" alt=""  height="40px" ></td>\
                    <td>` +  response.auction.name + `</td>\
                    <td> <img src="{{asset("Uploads/Auctions/`+response.auction.img+`")}}" alt=""  height="40px" ></td>\
                    <td>` +  response.price + `</td>\
                    <td>` +   response.user.phone  + `</td>\
                    
                    
                  
                    
                   
                      
                     
                     

                </tr>`);
      
    
              });}

})})
//delete
$(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();

            var id = $(this).val();

            $.ajax({
                type: "get",
                url: "delete/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                   
                      
                           alert(response.message);
                      
                    } else {
                       
                      fetchauction();
                    }
                }
            });
        });




//end delete




})
 </script>
     
 @endsection
 