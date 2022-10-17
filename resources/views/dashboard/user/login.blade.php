
@extends('dashboard.user.authlayout')

@section('content')






    <div class="container Signin " id=" ">

        <div class="Login">

            <div class="row">

                <div class="col-6">
                    <div class="leftSide">
                        <form action="{{ route('user.check') }}" method="post"  class="myForm text-center" autocomplete="off">
                            @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                            @csrf
                            <header>
                                Sign in
                            </header>
                           
                            <div class="form-group">


                                <i class="bi bi-envelope"></i>
                                <input class="myInput" type="email" name="email" placeholder="Email" id="email" autocomplete="off">
                                

                            </div>
                            <span  @error('email')   >
                                <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                    {{ $message }}
                                </h6>
                              
                                @enderror
                              </span>

                            <div class="form-group">


                                <i class="bi bi-lock"></i>
                                <input class="myInput" type="password" name="password"placeholder="Password" id="password" autocomplete="off" >
                                <span  @error('password')   >
                                    <h6 style="color: red; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                        {{ $message }}
                                    </h6>
                                  
                                    @enderror
                                  </span>

                            </div>
                            <div class="inner">
                                <button class="btn ">Sign in</button>
                            </div>

                            <div class="signup-link m-3">not a member? <a href="{{ route('user.register') }}">signup now</a></div>


                        </form>

                    </div>
                </div>
                <div class="col-6">
                    <div class="rightSide">


                        <div class="rightBox">
                            <header>Welcome Back!.</header>

                            <p>You Are Here Again We Glad For That Wish You A Greatful Experience ,Dear</p>
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>
    
    @endsection
