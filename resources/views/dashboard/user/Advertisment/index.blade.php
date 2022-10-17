

@extends('dashboard.user.layout')
@section('title')
Advertisment
@endsection
@section('content')
<div class="main-content bg-white " style="padding:20px ">
  <div class="title_right">
    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
      <div class="input-group">
        <input id="keyword" type="text" class="form-control m-3" placeholder="Search for..." style="border-radius: 15px">
   
      </div>
    </div>
  </div>


  <!--tabs--------------->
  <div class="container ">


      <div class="tab-content">
          <div class="tab-pane active m-1 " id="All">


              <div class="row border g-0 rounded shadow-sm">
                  <!-- column -->
                  <div class="col-12  text-center  ">

                      <table class="table   "
                          style="background-color: rgb(200 200 200 / 20%); border-radius: 15px;">
                          <thead class="thu">
                              <tr class="">

                                  <th scope="col">Title</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Conditions</th>
                                  <th scope="col">Is-active</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Actions</th>

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

<div class="modal fade" id="EditadvertismentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="row">
        <div class="container">
        <div class="col-md-12 mb-5 ">
         
          <div class="modal-body ">
            @include('dashboard.admin.inc.errors') 
        {{-- <form id="UpdateModal" method="POST"    data-parsley-validate class="form-horizontal form-label-left">
         @csrf
          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
          <div class="row">
          <div  class=" col-md-6">
            
            <input type="hidden" name="id" id="ad_id"    > 
            <ul class="alert alert-warning d-none" id="updateerrors"> </ul>
            <label  >title</span>
            </label>
            <div >
              <input type="text" required="required" class="form-control " name="title" id="title" >
            </div>
          </div>
          <div  class=" col-md-6">
            <label  >description</span>
            </label>
            <div >
              <input type="text" required="required" class="form-control " name="desc" id="desc"  >
            </div>
          </div>
            
            <div  class=" col-md-6">
              <br>
              <label  >Category
              </label>
             
                <select class="form-control" name='category_id' >
                  <option selected class="t_dn"  id="category_id"> </option>
                  @foreach ($categories as $category)
                  <option  value="{{$category->id}}" >{{$category->name}}</option> 
                  @endforeach
                  
                </select>
            
             
                
              </div>
              <div  class=" col-md-6">
                <br>
                <label  >price</span>
                </label>
                <div >
                  <input type="text" required="required" class="form-control " name="price"  id="price">
                </div>
              </div>
              <div  class=" col-md-6">
                <br>
                <label  >condition</span>
                </label>
                <div >
                  <input type="text" required="required" class="form-control " name="condition"  id="condition">
                </div>
               </div>
               <div  class=" col-md-6">
                <br>
                <label>is</span>
                </label>
                <div class="form-group mt-1 is_active " id="is_active"> 


                </div>
               </div>
              
              
               <div class=" col-md-6 ">
                <br>
                <div class="input-group  ">

                  <input class="form-control" type="file" id="formFile" name="img" id="img">

                  <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
              </div>
            </div> 
            

             
              <div  id="allphotos" class=" photos m-5 container-fluid" >
             
                {{-- هنا بنحط جواها الصور  --}}
               
              {{-- </div>
          
            
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
                <button  type="submit" class="btn btn-primary  ">submit</button>
                
              </div>
            </div>
          
  
          
          </div>
          </form> --}}

        

        <form id="UpdateModal" method="POST"    data-parsley-validate class="form-horizontal form-label-left">
          @csrf
           <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
           <div class="row">
           <div  class=" col-md-6">
            <input type="hidden" name="id" id="ad_id"    > 
            <ul class="alert alert-warning d-none" id="updateerrors"> </ul>
             {{-- <input type="hidden" name="id" id="auc_id"> 
             <ul class="alert alert-warning d-none" id="updateerrors"> </ul> --}}
             {{-- <div >
               <input type="text" required="required" class="form-control " name="title" id="title" >
             </div> --}}

             <label for="Product Name:" class="form-label "
                       style="color: #012970 ; font-family: Verdana, Geneva, Tahoma, sans-serif;">title
                       </label>
             
             <div>

               <input type="text" class="form-control"  placeholder="Enter Name"
                       style="border-radius: 5px; "  name="title" id="title">
             </div>
             <br>
             <label for="Product Price" class="form-label  " style=" color: #012970 ; font-family:
             Verdana, Geneva, Tahoma, sans-serif">category</label>
            
               <select class="form-control" name='category_id' >
                 <option selected class="t_dn"  id="category_id"> </option>
                 @foreach ($categories as $category)
                 <option  value="{{$category->id}}" >{{$category->name}}</option> 
                 @endforeach
                 
               </select>
               <h5 class="mt-3"> Select cover Image for Your Advertisment</h5>
               <hr>
                <div class="input-group  ">

                  <input class="form-control" type="file" id="formFile" name="img" id="img">

                  <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
              </div>
              <h6 class="mt-2" style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                Advertisment Condition</h6>
              <div >
                <select class="form-select mt-2 ml-5" style="border-radius: 10px" aria-label="Default select example" name="condition">
                  <option selected>Select condition</option>
                  <option >New</option>
                  <option >used</option>

              </select>

              <span class="mt-4 " style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                activation</span>
                <div class="form-check " id="is_active">
                  
                    
                      active
                    </label>

                </div>

              </div>
          
            

           </div>

           <div  class=" col-md-6">
             <label for="exampleFormControlTextarea1"
                       style="color: #012970 ; font-family: Verdana, Geneva, Tahoma, sans-serif;"
                       class="form-label">Description</label>
            <div >

               <input type="text" required="required" class="form-control "  name="desc" id="desc"   >
             </div>

              <label for="Product Price" class="form-label mt-4 " style=" color: #012970 ; font-family:
                        Verdana, Geneva, Tahoma, sans-serif">Price</label>
             
              <div >
               {{-- <input type="text" required="required" class="form-control " name="price"  id="price"> --}}

                <input type="text" class="form-control mt-1 " 
                    name="price"  id="price">
              </div>
            
              <h5 class="mt-3"> Select sub Image for Your Advertisment</h5>
               <hr>
               <div class="input-group mb-3 ">

                   <input type="file" class="form-control"  id="formFile"   name="imgs[]"
                  
                   accept="image/*"
                   multiple>
                   <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
               </div>
               

                <div class="container-fluid">
               <div id="allphotos"  class="photos row container-fluid">          
                    </div>
                </div>
             
        
              
  
             
           </div>
   
                   {{-- cover-img  --}}
                 
                   {{-- <input class="form-control" type="file" id="formFile" name="img" id="img">
 
                   <label class="input-group-text" for="inputGroupFile02">Upload Cover Image</label>
                 
            

             <div class="form-group mt-1 is_active " id="is_active">
               
              
               </div>
              
              
                 {{-- هنا بنحط جواها الصور  --}}
     

   
  
           </div>
           <div class="form-group">
            <br>
            <div class="col-md-6 ">
              <button  type="submit" class="btn btn-primary  ">submit</button>
              
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
@endsection

@section('scripts')
    <script>

      //get pop up
   $(document).ready(function(){
    //fetch-ads
    fetchadvertisment();
function fetchadvertisment() {

    $.ajax({
        type: "GET",
        url: "fetch-advertisment",
        dataType: "json",
        success: function (response) {
             console.log(response);
            $('tbody').html("");
            $.each(response.advertisment, function (key, item) {

               //is_accepted apperance////////////
               var startus;
                 if(item.is_accepted== 1) {    
                    startus= "accepted"
                     
                        }
                        else{
                            startus= "pending"

                        }
                     // end is_accepted apperance////////////
                      //is_active apperance////////////
                var activation;
                 if(item.is_active== 1) {    
                    activation= "active"
                     
                        }
                        else{
                            activation= "in-active"

                        }
                     // end is_active apperance////////////

                $('tbody').append(`<tr>\
                  <td>` + item.title+ `</td>\
                  <td> `+ item.desc+`</td>\
                    <td>` + item.category.name  + `</td>\
                    <td>` + item.price+ `</td>\
                    <td>` + item.condition + `</td>\
                    <td>` + activation  + `</td>\
                    <td>` + startus+ `</td>\
                    <td> <img src="{{asset("Uploads/advertisments/`+item.img+`")}}" alt=""  height="40px" class="rounded-circle" ></td>\
                    /<td>
                      <button type="button" value="` + item.id + `" class="edit_btn btn btn-info  btn-xs fa fa-pencil"> Edit</button>\
                    <button type="button" value="` + item.id + `" class="btn btn-danger delete_btn fa fa-trash-o "> Delete</button></td>\
                \</tr>`
      
                );
            });
        }
    });
}
    //endfetch-ads

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
});

$(document).on('click','.edit_btn',function(e)
{
e.preventDefault();
var ad_id=$(this).val();

$('#EditadvertismentModal').modal('show');

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
     
      $('#price').val(response.advertisment.price);
      $('#condition').val(response.advertisment.condition);  
      


       $('#allphotos').html("");
       $('#allphotos').removeClass('photos');  
        // بيرجع ال response من غيى مايشيل القديم
      console.log(response.images)
  $.each(response.images, function (key, images) { 
                      console.log(images)
							$('#allphotos').append(
    //             `
                
    
    // <img  src="{{asset("Uploads/Advertisments/`+images.image+`")}}" alt=""  height="40px" >
    //   `
     `      
    <div class="col-3">
                      <div class="image">
                          <img src="{{asset("Uploads/advertisments/`+images.image+`")}}" class="img-fluid w-75 image_img">
                          <div class="image_overlay">
                              <div class="image_close">
                                  <a href="" class="bi bi-x-circle-fill"> </a>

                              </div>
                          </div>

                      </div>
             </div>`
      );}
      );
      $.each(response.categories, function (key, categories) { 
        $('#category_id').val(categories.id);

$('#category_id').append(``+categories.name+` `);

});


       $('#is_active').html("");
       $('#is_active').removeClass('is_active');
    if (response.advertisment.is_active ==1){
        $('#is_active').append(
      `    
      <input type="checkbox" name="is_active"  checked class="switchery  m " data-color="success" />
      `
          );}
    
    else{
      

        $('#is_active').append(
      `    
      <input type="checkbox"name="is_active"   class="switchery  m " data-color="success" />
      `
          );
    }








 
    }}})})
 //post
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
 $('#EditadvertismentModal').modal('hide');
 fetchadvertisment();

 alert(data.message);
  }
  

},
error: function (xhr) {
        console.log(xhr.responseText);
    }



})})
  
  
  //end post method
//get delete


$(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();

            var id = $(this).val();

            $.ajax({
                type: "get",
                url: "delete/" + id,
                dataType: "json",
                success: function (response) {
               
                  if (response.status == 500) {

                            alert(response.message);

                    } else {
                      
                      fetchadvertisment();
                    }
                    }
              });
            });





  


  $('#keyword').keyup(function()
{
    let keyword=$(this).val()
   let url ="{{route('user.ads.search')}}"+"?keyword="+keyword
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
                    $('tbody').append(
                     

                    `
       
                   <tr>
                    <td>${advertisment.title}</td>

                  
                   <td>${advertisment.desc}</td>
                   <td>${advertisment.category.name }</td>
                  
                   <td>${advertisment.price}</td>
                   <td>${advertisment.condition}</td>
                   <td>`+active+`</td>
                   <td>`+accept+`</td>
                   <td> <img src="{{asset("Uploads/Advertisments/`+advertisment.img+`")}}" alt=""  height="40px" ></td>
                   
                   <td>


                    
                    <button type="button" value="` +advertisment.id+`" class="edit_btn btn btn-info  btn-xs fa fa-pencil"> Edit</button>
                                       <button id="myButton"  type="button" value="`+advertisment.id+`" class=" btn btn-danger fa fa-trash-o">deletet</button></td>
                
               </tr>
    

                    `

                )

            } 
          }});
        });




      }) 

      </script>

@endsection