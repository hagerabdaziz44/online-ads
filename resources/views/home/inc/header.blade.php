    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="HomePage.html" class="logo d-flex align-items-center">
             
                
                <div class="dropdown">
                    <span> <img src="{{asset("Uploads/home/LOGO000.png")}}" alt="">Quick</span>
                    <div class="dropdown-content">
                    <a href="HomePage.html">Home</a>
                    <a href="#">Categories</a>
                    <a href="AllAuctions.html">Auctions</a>
                    <a href="#">Advertisments</a>
                    <a href="#">Login</a>
                    {{-- <a href="#">logout</a> --}}

                  </div>
                </div>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto " href="{{url('home/main')}}" >Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <div class="nav-dropdown">

                    <li><a class="nav-link scrollto" >Categories</a></li>
                        <div class="cat-drop">
                          @foreach ($category as $cat)
                          <a href="{{route('home.show',$cat->id)}}">{{$cat->name}}</a>   
                          @endforeach
                           
                            
                          </div>
                        </div>
                         <div class="nav-dropdown">

                    <li><a class="nav-link scrollto">Auctions</a></li>
                         <div class="cat-drop">
                        <a href="{{url('home/allauctions')}}">All Auctions</a>
                        @auth
                        <a href="{{url('user/auction/index')}}">My Auctions</a>
                        @endauth
                        <a href="{{url('user/auction/create')}}">Create Auction</a>
                      </div>
                    </div>
                    <div class="nav-dropdown">

                    <li><a class="nav-link scrollto">Advertisements</a></li>
                    <div class="cat-drop">
                        <a href="{{url('home/allAds')}}">All Advertisements</a>
                        @auth
                        <a href="{{url('user/advertisment/index')}}">My Advertisements</a>
                        @endauth
                        <a href="{{url('user/advertisment/create')}}">Create Advertisement</a>
                      </div>
                    </div>
                   @auth
                   <li><a  href="{{url('user/profile')}}">Profile</a></li>
                   <li> <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color: #012970 ;font-family:  'Poppins',sans-serif;" ><span class="mx-3">Logout</span></a></li>
                    <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>  
                   @endauth
                    


                    {{-- <li><a class="nav-link scrollto" href="">Logout</a></li> --}}

                  
  
                    
                    @guest
                    <a href="{{route('user.login')}}" class="sign "> <i class="bi bi-person nav-link scrollto sign ">
                      Sign in</i></a>     
                    @endguest
                      
                   
                 
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
                
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header --> 