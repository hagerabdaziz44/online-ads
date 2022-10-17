<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-top" >
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="#hero" class="logo d-flex align-items-center">
                        <img src="assets/img/logo.png" alt="">
                        <span>Quick</span>
                    </a>
                    <br>
                    <p>We Glad To Help You To Get You Want With Best Quality, Best Service and Prices.</p>
                    <p> We have advertisments to make you choose What you want with best prices wish
                        you a happy shopping in our Website. </p>
                    <p>
                        We have also auctions to make you choose your prices with start date and end date wish
                        you a happy shopping in our Website.
                    </p>

                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{url('home/main')}}">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{url('home/main')}} ">About us</a></li>

                       
                        <li><i class="bi bi-chevron-right"></i> <a href="#policy">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Pages</h4>
                    <ul>
                        @auth
                        <li><i class="bi bi-chevron-right"></i> <a href="{{url('user/profile')}}">Profile</a></li>
                        @endauth
                        <li><i class="bi bi-chevron-right"></i> <a href="{{url('home/allAds')}}">Advertisements</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{url('home/allauctions')}}">Auctions </a></li>
                        @auth
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color: #012970 ;font-family:  'Poppins',sans-serif; "><span class="mx-3">Logout</span></a>
                            <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form></li></li> 
                        @endauth
                        @guest
                        <li><i class="bi bi-chevron-right"></i> <a href="{{url('home/register')}}">Sign up</a></li>
                       
                        @endguest
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i
            class="bi bi-arrow-up-short"></i></a>
</footer>