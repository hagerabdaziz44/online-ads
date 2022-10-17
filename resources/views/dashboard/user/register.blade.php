
@extends('dashboard.user.authlayout')

@section('content')


{{-- <body style="background-color: rgb(240, 238, 238);"> --}}
    <div class="container Register m-1" id="" >
        <div class="register">
            <div class="row">
                <div class="col-7">
                    <div class="leftSide p-1">
                        <form action="{{ route('user.create') }}" method="post" enctype="multipart/form-data" class="myForm text-center">
                            {{-- @if (Session::get('fail'))
                                <div class="alert alert-primary">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif --}}

                            @csrf
                            <header>
                                Register
                            </header>
                        
                            <div class="form-group">


                                <i class="bi bi-person-dash"></i>
                                <input class="myInput" type="text" placeholder="First Name" name="first_name" id="First Name"  value="{{ old('first_name') }}">

                            </div>
                            <span  @error('first_name')   >
                                <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                    {{ $message }}
                                </h6>
                              
                                @enderror
                              </span>
                            <div class="form-group">


                                <i class="bi bi-person-dash-fill"></i>
                                <input class="myInput" type="text" placeholder="Last Name" name="last_name" id="Last Name" value="{{ old('first_name') }}">

                            </div>
                            <span  @error('last_name')   >
                                <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                    {{ $message }}
                                </h6>
                              
                                @enderror
                              </span>
                            

                            <div class="form-group">

                               
                                <i class="bi bi-envelope"></i>
                                <input class="myInput" type="email" placeholder="Email" name="email" id="email"  value="{{ old('email') }}" >

                            </div>
                            <span  @error('email')   >
                                <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                    {{ $message }}
                                </h6>
                              
                                @enderror
                              </span>

                            <div class="form-group">


                                <i class="bi bi-lock"></i>
                                <input class="myInput" type="password" placeholder="Password" name="password" id="password" value="{{ old('password') }}" >

                            </div>
                            <span  @error('password')   >
                                <h7 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                    {{ $message }}
                                </h7>
                              
                                @enderror
                              </span>

                            <div class="form-group">


                                <i class="bi bi-lock-fill"></i>
                                <input class="myInput" type="password" placeholder="ConfirmPassword" name="field" id="field" value="{{ old('confirm password') }}"
                                   >

                            </div>
                            <span  @error('field')   >
                                <h7 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                    {{ $message }}
                                </h7>
                              
                                @enderror
                              </span>
                            
                            <div class="form-group">


                                <i class="bi bi-lock-fill"></i>
                                <input class="myInput" type="phone" placeholder="phone" name="phone"  value="{{ old('phone') }}"
                                    >

                            </div>
                            <span  @error('phone')   >
                                <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                    {{ $message }}
                                </h6>
                              
                                @enderror
                            </span>

                            <div class="form-group">


                                    {{-- <input type="file" id="file" class="upload">
                                    <label for="file" class=" text-center upload-label">

                                        <input type="file" class="form-control-file  btn btn-info bi bi-folder-plus" name="img" >
                                      
                                    </label> --}}

                                    <div >

                                        <input type="file" id="file" class="upload" name='img' >
                                        <label for="file" class=" text-center registerbuton ">

                                            <i class="bi bi-folder-plus "></i> <span class="p-5 register1" style="color:  slateblue;;
                                            ;font-family:Verdana, Geneva, Tahoma, sans-serif;font-weight: 500">choose a photo </span>
                                        </label>
                                    
                                    </div>
                                
                            </div>
                            <span  @error('img')   >
                                <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                    {{ $message }}
                                </h6>
                              
                                @enderror
                            </span>

                                <button type="submit" >Register</button>
                            
                            
                            <div class="signup-link m-3">already have an account? <a href="{{ route('user.login') }}">signin now</a></div>
                        </form>
                    </div>
                </div>





                <div class="col-5">
                    <div class="rightSide">


                        <div class="rightBox">
                            <header>Hello Friend!.</header>

                            <p>We are Happy for Visiting Our Website! Wish You A Greatfull Shopping ,Dear</p>
                        </div>

                    </div>
                </div>
                </div>



            </div>
        </div>
    </div>

@endsection