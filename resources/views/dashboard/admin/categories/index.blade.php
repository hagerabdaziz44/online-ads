
@extends('dashboard.admin.layout')
@section('content')
<div class="right_col" role="main">
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

     
      {{-- new --}}
      <div class="row" >
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>All Categories </h2>
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
             
              <table  class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Is_active</th>
                    <th>Status</th>
                    <th>Actions</th>
                    
                  </tr>
                </thead>

                  
                <tbody id="allcategories">
                  {{-- @foreach ($categories as $category)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                   
                    <td>{{$category->name}}</td>
                    <td>{{$category->desc}}</td>
                    <td><a  class="btn  btn btn-info fa fa-pencil " href="{{route('admin.categories.edit', $category->id )}}"> Edit </a>
                        <a  class="btn btn-danger fa fa-trash-o " href="{{route('admin.categories.delete', $category->id )}}"> Delete </a></td>
                   
                  </tr>
                  @endforeach
                  
                    
                 
                </tr>
                   --}}
                
                 
              
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
    <div class="modal fade" id="EditEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered" role="document">
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
                
                <input type="hidden" name="id" id="category_id"    > 
                <ul class="alert alert-warning d-none" id="updateerrors"> </ul>
                <br>
                <label  >title</span>
                </label>
                <div >
                  <input type="text" required="required" class="form-control " name="name" id="name" >
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
              <div class="col-md-12">
                <br>
              
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
       //fetchadvertisment
  fetchcategory();

function fetchcategory() {
    $.ajax({
        type: "GET",
        url: "fetch-category",
        dataType: "json",
        success: function (response) {
            console.log("hello");
            console.log(response.categories);
            $('tbody').html("");

            $.each(response.categories, function (key, item) {
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
                  <td> `+ item.name +`</td>\
                  <td> `+ item.desc +`</td>\
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
   $('#keyword').keyup(function()
  {
  
      let keyword=$(this).val()
      let url ="{{route('admin.categories.search')}}"+"?keyword="+keyword
      console.log(url);
  
      $.ajax(
          {
              type:"GET",
              url:url,
              contentType:false,
              processData:false,
              success: function ( data)
               {
                  $('#allcategories').empty()
                  
                 
                 
                  for (category of data){

                    
                      $('#allcategories').append(
  
                      `
                    
                   
                     
                      
                                      
                     <tr>
                     <td>${category.id}</td> 
                     <td>${category.name}</td> 
                     <td>${category.desc}</td>
                     <td><button id="myButton2"  type="button" value="`+category.id+`" class="edit_btn btn btn-info  fa fa-pencil">edit</button>
                   <button id="myButton"  type="button" value="`+category.id+`" class="delete_btn btn btn-danger fa fa-trash-o">deletet</button></td> 
                    
                    
                     
                     
                    
                    
  
                    
                  
                 </tr>
                   
                 
               
                 
                 
               
             
          
                
                     
                     
                      
                      
                     
                   
                     
      
  
                      `
              
  
                  )
  
              }
            
             //delete
             document.getElementById("myButton").onclick = function () {

location.href="delete/"+ category.id
};
//edit
document.getElementById("myButton2").onclick = function () {

location.href="edit/"+ category.id
};
            
            
            
            
            }
          }
      )
  })
  //getfunction
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
    
      $('#category_id').val(response.categories.id);
      $('#name').val(response.categories.name);
      $('#desc').val(response.categories.desc);
      $('#is_active').html("");
      $('#is_active').removeClass('active');
      if(response.categories.is_active ==1)
      {
        $('#is_active').append(`
       
          <label class="form-check-label  fs-2" for="flexCheckDefault" style="font-size:15px">
                        Active
                      </label>
        <input type="checkbox" value="1" name="is_active"
           id="switcheryColor4" class="switchery" data-color="success"
                 checked  />`)
       
                
      }
      else
      {
        $('#is_active').append(`
        <lable class="form-check-label  fs-2" for="flexCheckDefault" style="font-size:15px">Active<label>
        <input type="checkbox" value="1" name="is_active"
           id="switcheryColor4" class="switchery" data-color="success"
                 />`)
       
                
      }
      $('#is_accepted').html("");
      $('#is_accepted').removeClass('accept');
      if(response.categories.is_accepted==1)
      {
        $('#is_accepted').append(`
       
          <label class="form-check-label  fs-2" for="flexCheckDefault" style="font-size:15px">
                     Accepted
                      </label>
        <input type="checkbox" value="1" name="is_accepted"
           id="flexCheckDefault" class="switchery" data-color="success"
                 checked  />`)
       
                
      }
      else
      {
        $('#is_accepted').append(`
        <lable class="form-check-label  fs-2" for="flexCheckDefault" style="font-size:15px">Accepted<label>
        <input type="checkbox" value="1" name="is_accepted"
           id="flexCheckDefault" class="switchery" data-color="success"
                 />`)
       
                
      }
     

    
      

						}}) });
      
      
   
  //endgetfunction
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
});
$(document).on('submit','#UpdateModal',function(e)
{
e.preventDefault();

var id=$('#category_id').val();


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
 fetchcategory();

 alert(data.message);
  }
  

},
error: function (xhr) {
        console.log(xhr.responseText);
    }



})});
// end post
//delete
$(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();

            var id = $(this).val();
console.log('batikha')
            $.ajax({
                type: "get",
                url: "delete/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                   
                      
                           alert(response.message);
                      
                    } else {
                       
                      fetchcategory();
                    }
                }
            });
        });




//end delete
  </script>
      
  @endsection