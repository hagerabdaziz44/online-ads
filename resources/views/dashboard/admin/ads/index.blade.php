@section('title')
Index
@endsection
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

      <div class="row" >
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>All Advertisments </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" >
                <div class="row" >
                    <div class="col-sm-12" >
                      <div class="card-box table-responsive" >
             
              <table  id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>category</th>
                    <th>price</th>
                    <th>condition</th>
                    <th>Address</th>
                    <th>img</th>
                    <th>Is_active</th>
                    <th>Status</th>
                     <th>actions</th>
                   
        
                    
                    
                  </tr>
                </thead>

                  
                <tbody id="allbooks">
                

                  
                 
              
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
 {{-- edit modal --}}
  <div class="modal fade" id="EditEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
      <div class="modal-content">
        
        <div class="row container">
          {{-- <div class="container"> --}}
          <div class="col-md-12 mb-5 ">
           
            <div class="modal-body ">
              @include('dashboard.admin.inc.errors') 
          <form id="UpdateModal" method="POST"    data-parsley-validate class="form-horizontal form-label-left">
           @csrf
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="row">
            <div  class=" col-md-12">
              
              <input type="hidden" name="id" id="ad_id"    > 
              <ul class="alert alert-warning d-none" id="updateerrors"> </ul>
              <br>
              <label  >title</span>
              </label>
              <div >
                <input type="text" required="required" class="form-control " name="title" id="title" >
              </div>
            </div>
            <div  class=" col-md-12">
              <br>
              <label  >description</span>
              </label>
              <div >
                <input type="text" required="required" class="form-control " name="desc" id="desc"  >
              </div>
            </div>
          

            <div  class=" col-md-12">
              
              <br>
              <label  >user
              </label>
             
                <select class="form-control" name="user_id"    >
                  
                  
                  <option selected class="t_dn"  id="userid"> </option>
                    @foreach ($user as $us)
                    
                      <option  value="{{$us->id}}">{{$us->email}}</option> 
                      @endforeach
                  
                </select>
            
             
                
              </div>
              
              <div  class=" col-md-12">
                <br>
                <label  >Category
                </label>
               
                  <select class="form-control" name='category_id' >
                    
                    @foreach ($categories as $category)
                    <option id="category_id" value="{{$category->id}}" >{{$category->name}}</option> 
                    @endforeach
                    
                  </select>
              
               
                  
                </div>
                <div  class=" col-md-12">
                  <br>
                  <label  >price</span>
                  </label>
                  <div >
                    <input type="text" required="required" class="form-control " name="price"  id="price">
                  </div>
                </div>
             
                <div  class=" col-md-12">
                  <br>
                  <label  >Condition
                  </label>
                 
                    <select class="form-control" name='condition'>    

                     
                      <option  selected  id="condition"  ></option> 

                      <option   > New</option> 
                      <option   >Used</option> 
                      
                    </select>
                
                 
                    
                  </div>
                  <div  class=" col-md-12">
                    <br>
                    <label  >Address</span>
                    </label>
                    <div >
                      <input type="text" required="required" class="form-control " name="address" id="address"  >
                    </div>
                  </div>





                
                
                 <div class=" col-md-12">
                  <br>
                  <div class="input-group  ">

                    <input class="form-control p-1" type="file" id="formFile" name="img" id="img">

                    <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
                </div>
              </div> 
              
           
              <div class="editImg col-md-6" >

                <div class="row container   " >
                  <div class="image photos" id="allphotos">

                  </div>
                 
                    
                    


                </div>



            </div>

               
          
               
                
          
              <div class=" col-md-12 ">
                <br>
                <div class="input-group  ">

                  <input class="form-control " type="file" id="formFile"   name="imgs[]"
                   
                  accept="image/*"
                  multiple>

                  <label class="input-group-text" for="inputGroupFile02">Upload all Images</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="col-md-6">
              <div class="form-group mt-1 active " id="is_active">
              </div> 
              </div>
              <div class="col-md-6">
                <div class="form-group mt-1 accept " id="is_accepted">
                </div> 
                </div>


          </div>
              
              <div class="ln_solid"></div>
              <div class="form-group">
                <br>
                <div class="col-md-12 ">
                  <button  type="submit" class="btn btn-primary  ">submit</button>
                  
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
 @section('scripts')



<script>
  

$(document).ready(function(){
  //fetchadvertisment
  fetchadvertisment();

function fetchadvertisment() {
    $.ajax({
        type: "GET",
        url: "fetch-advertisment",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            $('tbody').html("");
            $.each(response.advertisment, function (key, item) {
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

                $('tbody').append(`<tr>\
                  <td>` + item.id + `</td>\
                  <td> `+ item.user.first_name +`</td>\
                    <td>` + item.title + `</td>\
                    <td>` + item.desc + `</td>\
                    <td>` + item.category.name + `</td>\
                    <td>` + item.price + `</td>\
                    <td>` + item.condition + `</td>\
                    <td>` + item.address + `</td>\
                    <td> <img src="{{asset("Uploads/Advertisments/`+item.img+`")}}" alt=""  height="40px" ></td>\
                    
                    <td>` + active + `</td>\
                    <td>` + accept + `</td>\
                    /<td>
                      
                      <button type="button" value="` + item.id + `" class="edit_btn btn btn-info  btn-xs fa fa-pencil"> Edit</button>\
                    <button type="button" value="` + item.id + `" class="btn btn-danger delete_btn fa fa-trash-o "> Delete</button></td>\
                \</tr>`);
            });
        }
    });
  }
  //end fetchadvertisment
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
});
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
                       
                      fetchadvertisment();
                    }
                }
            });
        });




//end delete
// get edit
$(document).on('click','.edit_btn',function(e)
{
e.preventDefault();
var ad_id=$(this).val();

$('#EditEmployeeModal').modal('show');

$.ajax(
  {
   type:"GET",
   
  url:"edit/"+ad_id,
  success: function (response)
  {
    if(response.status==404)
    {
      alert(response.message);
      $('#EditEmployeeModal').modal('hide');
    }
    else
    {
      $('#ad_id').val(response.advertisment.id);
      $('#title').val(response.advertisment.title);
      $('#desc').val(response.advertisment.desc);
      $('#address').val(response.advertisment.address);
      $('#price').val(response.advertisment.price);
      // $('#condition').val(response.advertisment.condition);  
     

      $('#is_active').html("");
      $('#is_active').removeClass('active');

      if(response.advertisment.is_active ==1)
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
      if(response.advertisment.is_accepted==1)
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
      
      
      // console.log(response.advertisment.price);
      $('#userid').html("");
      $('#userid').removeClass('t_dn');
      
      $.each(response.users, function (key, users) { 

         $('#userid').val(users.id);
         $('#userid').append(``+users.email+` `);
         
      });

      $('#allphotos').html("");
      $('#allphotos').removeClass('photos');
      console.log(response.images)
  $.each(response.images, function (key, images) {
    
							$('#allphotos').append(`

              
    
   
              <button class="delete_sub" value="`+images.id+`" >X</button>
          <img src="{{asset("Uploads/Advertisments/`+images.image+`")}}">
           

               
     
      `
               
      );
    

						});
      
      
   

    
            $(document).on('click', '.delete_sub', function (e) {
            e.preventDefault();

            var id = $(this).val();

            $.ajax({
                type: "get",
                url: "deleteimage/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                   
                      
                           alert(response.message);
                      
                    } else {
                       
                      alert.message();
                    }
                }
            });
        });

    
  }
 
}
})})
//delete sub images



//end delete sub images
// end get edit
// post

  
$(document).on('submit','#UpdateModal',function(e)
{
e.preventDefault();

var id=$('#ad_id').val();


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
       
 let edit =new FormData($('#UpdateModal')[0]);         

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
 fetchadvertisment();

 alert(data.message);
  }
  

},
error: function (xhr) {
        console.log(xhr.responseText);
    }



})})})
// end post
// real timesearch
$('#keyword').keyup(function()
{
    let keyword=$(this).val()
   let url ="{{route('admin.ads.search')}}"+"?keyword="+keyword
    console.log(url);
   
   


    $.ajax(
        {
            type:"GET",
            url:url,
            contentType:false,
            processData:false,
            success: function ( data)
             {
                $('#allbooks').empty()
                
               
               
                for (advertisment of data){
                  var active;
              if(data.is_active == 1)
              {
                active='Active'
              }
              else
              {
                active='InActive'
              }
              var accept;
              if(data.is_accepted == 1)
              {
                accept='Accepted'
              }
              else
              {
                accept='Pendding'
              }
                    $('#allbooks').append(
                     

                    `
       
                   <tr>
                   <td>${advertisment.id}</td> 
                   <td>${advertisment.user.first_name }</td>
                  
                   <td>${advertisment.title}</td>
                   <td>${advertisment.desc}</td>
                   <td>${advertisment.category.name }</td>
                  
                   <td>${advertisment.price}</td>
                   <td>${advertisment.condition}</td>
                   <td>${advertisment.address}</td>
                   <td> <img src="{{asset("Uploads/Advertisments/`+advertisment.img+`")}}" alt=""  height="40px" ></td>
                  
                   <td>`+active+`</td>
                   <td>`+accept+`</td>
                   
                   <td>
                    <button data-toggle="modal " data-target="#exampleModalCenter" class= " edit_btn btn btn-info  fa fa-pencil" value="`+advertisment.id+`"> Edit</button>
                 
                   <button id="myButton"  type="button" value="`+advertisment.id+`" class=" btn btn-danger fa fa-trash-o">deletet</button></td>
                
               </tr>
    

                    `

                )

            } 
            //delete
            document.getElementById("myButton").onclick = function () {

              location.href="delete/"+ advertisment.id
   };
   //edit

  
  }
        }
    )


})

// end real time search
</script>
    
@endsection