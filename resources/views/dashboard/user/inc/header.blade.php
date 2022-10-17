<div class="top-navbar  ">
    <nav class="navbar navbar-expand-lg usernav " style="background-color:white ; height: 67.5px;  ">
        <div class="container-fluid ">


            <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"
                id="navbarSupportedContent">
                <ul class="nav navbar-nav ms-5">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('home/main')}}"
                            style="color:#012970; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="HomePage.html #about"
                            style="color:#012970; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                            About
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{url('home/allAds')}}"
                            style="color:#012970; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                            Advertisements
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('home/allauctions')}}"
                            style="color:#012970; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                            Auctions
                        </a>
                    </li>



                </ul>
            </div>
        </div>
        <div class="user-img w-25">
            <img src="{{asset('Uploads/home/user.png')}}" class="container-fluid w-25"><span class="name-user "
                style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color: #012970;">
                {{ Auth::guard('web')->user()->first_name }} {{ Auth::guard('web')->user()->last_name }}</span>
        </div>
    </nav>
</div>