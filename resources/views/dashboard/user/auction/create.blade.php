@extends('dashboard.user.layout')
@section('content')
{{-- @include('dashboard.admin.inc.errors') --}}
  <div class="main-content " style="background-color:whitesmoke;">


    <div class="row">
        <div class="col-5 createInfo">
          <form method="POST" action="{{route('user.auction.store')}}" enctype="multipart/form-data" autocomplete='off' >
            @csrf
            <div class="mb-3 mt-5 ">
                <label for="Product Name:" class="form-label mt-5">Auction Name</label>
                <input type="text" class="form-control" id="" placeholder="Enter Name"
                    style="border-radius: 5px;" name="name" value="{{old('name')}}">
            </div>
            <span  @error('name')   >
                <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                    {{ $message }}
                </h6>
              
                @enderror
              </span>
            <div class=" mt-1">
                <label for="Product Price" class="form-label  ">Minmum Price:</label>
                <input type="text" class="form-control "  
                    name="min_price" {{old('min_price')}}>
            </div>
            <span  @error('min_price')   >
                <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                    {{ $message }}
                </h6>
              
                @enderror
              </span>

      <h5 style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;" class="mt-3"> Select Cover Image for Your Auction</h5>
            <hr>       
<div class=" input-group mb-3 ">

    <input type="file" class="form-control" id="inputGroupFile02" name="img"
        style="border-radius: 5px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
    <label class="input-group-text" for="inputGroupFile02"
        style="border-radius: 5px; font-family:Verdana, Geneva, Tahoma, sans-serif ;">Upload
        Image</label>
      
  </div>
  <span  @error('img')   >
    <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        {{ $message }}
    </h6>
  
    @enderror
  </span>

  <p>
    <label for=" date">Start date</label>
    <br>
    <input data-date-format="Y-M-D H:i:s" type="text" placeholder="2022-08-14 17:36:13"  id="date" class="w-100"
        style=" color:#060d1a ; border-color: transparent; padding: 5px;" name="start_date" {{old('start_date')}}>
</p>
<span  @error('start_date')   >
    <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        {{ $message }}
    </h6>
  
    @enderror
  </span>


            <div class=" w-100 ">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                    style="border-radius: 5px;" name="desc">{{old('desc')}}</textarea>

            </div>
            <span  @error('desc')   >
                <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                    {{ $message }}
                </h6>
              
                @enderror
              </span>

           

           

            

           
        </div>

        <div class="col-7 mt-5 p-5 createInfo2 ">

            <div class="mb-3">
                <label for="Product Name:" class="form-label mt-2">Address</label>
                <input type="text" class="form-control" id="" placeholder="Enter Address"
                    style="border-radius: 5px;" name="address">
            </div>
            <span  @error('address')   >
                <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                    {{ $message }}
                </h6>
              
                @enderror
              </span>
            

            <h6 class="mt-4" style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                Auction Condition</h6>
    
                {{-- <input class="form-check-input p-2" type="radio" name="flexRadioDefault"> --}}
                {{-- <span style="font-family: Verdana, Geneva, Tahoma, sans-serif; color: #012970;">Categories</span> --}}
                <select class="form-select mt-3  ml-5" aria-label="Default select example" name="condition">
                    
                    <option >New</option>
                    <option >used</option>

                </select>
                <h5 style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;" class="mt-3"> Select sub Images for Your
                    advertisment</h5>
                <hr>


                <div class=" input-group mb-3 ">

                    <input type="file" class="form-control" id="inputGroupFile02"name="imgs[]"
                    class="form-control" 
                    accept="image/*"
                    multiple
                        style="border-radius: 5px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                    <label class="input-group-text" for="inputGroupFile02"
                        style="border-radius: 5px; font-family:Verdana, Geneva, Tahoma, sans-serif ;">Upload
                        Image</label>
                </div>

                <p>
                    <label for="date">End date</label>
                    <br>
                    <input data-date-format="Y-M-D H:i:s" type="text" placeholder="2022-08-14 17:36:13" id="date "  class="w-100 m-2"
                        style="color:#060d1a ; border-color: transparent; padding: 5px;" name="end_date" {{old('end_date')}}>
                </p>
                <span  @error('end_date')   >
                    <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                        {{ $message }}
                    </h6>
                  
                    @enderror
                  </span>

            





            

                <span class="mt-5 my-3 pt-3" style="color: #012970; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                    activation</span>
                    <div class="form-check ">
                      
                        <input class="form-check-input p-2 mt-2" type="checkbox"name='is_active'
                            >
                        <label class="form-check-label p-0" for="flexRadioDefault2">
                          active
                        </label>

                    </div>

        </div>


        <div class="text-center p-2 mb-3 ">
            <button class="btn "
                style="background-color: #012970 ; color: white; font-family: Verdana, Geneva, Tahoma, sans-serif; border-radius: 10px;">
                Create New
                Auction</button>
        </div>










    </div>
  </form>
</div>
</div>



@endsection















