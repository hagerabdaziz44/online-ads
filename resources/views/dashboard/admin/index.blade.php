@extends('dashboard.admin.layout')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Dahboard</h3>
        </div>

       
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="">
            <div class="x_content">
              <div class="row">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user"></i>
                    </div>
                    <div class="users count" id="users"> </div>

                    <h3>Users</h3>
                  
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-edit"></i>
                    </div>
                    <div class="cats count" id="cats"></div>

                    <h3>Categories</h3>
                    
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-desktop"></i>
                    </div>
                    <div class="adss count" id="adss"></div>

                    <h3>Advertisments</h3>
                   
                  </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-table"></i>
                    </div>
                    <div class="auctions count" id="auctions"></div>

                    <h3>Auctions</h3>
                    
                  </div>
                </div>
              </div>

             



              <br />
            
              <div class="title_left">
                <h3>Pendding Advertisments</h3>
              </div>
      
            <table  id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                   
                    <th>Title</th>
                    <th>Description</th>
                    <th>category</th>
                    <th>price</th>
                    <th>condition</th>
                    <th>img</th>
                   
                    <th>Status</th>
                     <th>actions</th>
                   
        
                    
                    
                  </tr>
                </thead>

                  
                <tbody id="allads" class="adds">
          
        
              </table>
            </tbody>
            <div class="title_left">
              <h3>Pendding Auctions</h3>
            </div>
              <table  id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                  
                    <th>Auction Name</th>
                    <th>Description</th>
                    <th>start_date</th>
                    <th>end_date</th>
                    <th>minimum_price</th>
                    <th>cover photo</th>
                    <th>condition</th>
                    <th>status</th>
                    <th>Actions</th>
                    
                  </tr>
                </thead>


                <tbody id="auctions" class="auction">
                  
              
                </tbody>
              </table>
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
  fetchcounter();
  pendding_ad();
  pendding_auction();
  function fetchcounter() {
    $.ajax({
        type: "GET",
        url: "counter",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            $('.users').html("");
            $('#users').html(response.user);
            $('.cats').html("");
            $('#cats').html(response.category);
            $('.adss').html("");
            $('#adss').html(response.advertisment);
            $('.auctions').html("");
            $('#auctions').html(response.auction);
            
     
        }
    });
  }
function pendding_ad() {
    $.ajax({
        type: "GET",
        url: "pendding_ad",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            $('.adds').html("");
            $.each(response.advertisment, function (key, item) {
              if(item.is_active == 1)
              {
                active='Active'
              }
              else
              {
                active='InActive'
              }
             
                $('.adds').append(`<tr>\
                    <td>` + item.id + `</td>\
                    
                    <td>` + item.title + `</td>\
                    <td>` + item.desc + `</td>\
                    <td>` + item.category.name + `</td>\
                    <td>` + item.price + `</td>\
                    <td>` + item.condition + `</td>\
                    <td> <img src="{{asset("Uploads/Advertisments/`+item.img+`")}}" alt=""  height="40px" ></td>\
                    
                    <td>` + active + `</td>\
                   
                    /<td>
                      
                      <button type="submit" value="` + item.id + `" id ="accept "class="accept btn btn-success   "> Accept</button>
                      
                     
                    <button type="button" value="` + item.id + `" class="btn btn-danger delete_btn  "> Cancle</button></td>\
                  
                \</tr>`);
            });
        }
    });
  }
  //end fetchadvertisment

//end pendding_ad
//pendingauction
function pendding_auction() {
    $.ajax({
        type: "GET",
        url: "pendding_auction",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            $('.auction').html("");
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
             
                $('.auction').append(`<tr>\
                    <td>` + item.id + `</td>\
                    
                    <td>` + item.name + `</td>\
                    <td>` + item.desc + `</td>\
                    <td>` + item.start_date + `</td>\
                    <td>` + item.end_date + `</td>\
                    <td>` + item.min_price + `</td>\
                    <td> <img src="{{asset("Uploads/auctions/`+item.img+`")}}" alt=""  height="40px" ></td>\
                    <td>` + item.condition + `</td>\
                    <td>` + active + `</td>\
                    
                   
                   
                    /<td>
                      <button type="submit" value="` + item.id + `" id ="accept "class="accept_btn btn btn-success   "> Accept</button>
                      
                     
                      <button type="button" value="` + item.id + `" class="btn btn-danger delete   "> Cancle</button></td>\
                      
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

//end penddingauction
//deleteads
$(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();

            var id = $(this).val();

            $.ajax({
                type: "get",
                url: "cancle/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                   
                      
                           alert(response.message);
                      
                    } else {
                       
                     pendding_ad();
                     fetchcounter();
                    }
                }
            });
        });



//end deleteads
//delete auction
$(document).on('click', '.delete', function (e) {
            e.preventDefault();

            var id = $(this).val();

            $.ajax({
                type: "get",
                url: "cancle-auction/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                   
                      
                           alert(response.message);
                      
                    } 
                    else {
                       
                     pendding_auction();
                     fetchcounter();
                    }
                }
            });
        });
//end delete auction
// postads

  
$(document).on('click','.accept',function(e)
{
e.preventDefault();

var id=$(this).val();


var xhr = new XMLHttpRequest(),
    method = "POST",
    url="accept/"+id;

xhr.open(method, url, true);
xhr.onreadystatechange = function () {
  if(xhr.readyState === XMLHttpRequest.DONE) {
    var status = xhr.status;
    if (status === 0 || (status >= 200 && status < 400)) {
     
      console.log(xhr.responseText);
    } 
}};


              
//  let edit =new FormData($('#UpdateModal')[0]);        
var data = {

                'is_accepted': $('#img').val(),
                    

              } 


$.ajax(
  {
  
  
   type:"POST",
   
  url:"accept/"+id,
  enctype:"multipart/form-data",
  data:data,
 
  
  dataType: "json",
  
  
  contentType:false,
  processData:false,

  success: function (data){
 
  if(data.status==200)
  {
 
    pendding_ad();
    fetchcounter();

 
  }
  

},
error: function (xhr) {
        console.log(xhr.responseText);
    }



})})
// end postads 
//post auction
$(document).on('click','.accept_btn',function(e)
{
e.preventDefault();

var id=$(this).val();


var xhr = new XMLHttpRequest(),
    method = "POST",
    url="accept-auction/"+id;

xhr.open(method, url, true);
xhr.onreadystatechange = function () {
  if(xhr.readyState === XMLHttpRequest.DONE) {
    var status = xhr.status;
    if (status === 0 || (status >= 200 && status < 400)) {
     
      console.log(xhr.responseText);
    } 
}};

var data = {

'is_accepted': $('#img').val(),
    

} 
              
//  let edit =new FormData($('#UpdateModalauction')[0]);         


$.ajax(
  {
  
  
   type:"POST",
   
  url:"accept-auction/"+id,
  enctype:"multipart/form-data",
  data:data,
 
  
  dataType: "json",
  
  
  contentType:false,
  processData:false,

  success: function (data){
 
  if(data.status==200)
  {
 
    pendding_auction();
    fetchcounter();

 
  }
  

},
error: function (xhr) {
        console.log(xhr.responseText);
    }



})})})
//end post auction





    </script>
@endsection