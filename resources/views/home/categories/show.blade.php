@extends('home.layout')

@section('content')
<section id="recent-blog-posts" class="recent-blog-posts mt-5">
    <div class="container" data-aos="fade-up">



        <div class=" section-header">
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
            data-portfolio-sort="original-order">
          
            
            <h2>Our Advertisments</h2>
            <p>We have everything you want</p>
            <div class="row gy-5 mt-3">
               @foreach ($ads as $ad)
               <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="post-item position-relative h-100">

                    <div class="post-img position-relative overflow-hidden">
                        <img src="{{asset("Uploads/advertisments/$ad->img")}}" class="img-fluid" alt="">
                    </div>

                    <div class="post-content d-flex flex-column">

                        <h3 class="post-title ms-1" style="text-align: left">
                            {{$ad->title}}</h3>

                        <div class="meta d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-geo-alt"></i> <span class="ps-2">
                                   {{$ad->price}}
                                </span>
                            </div>


                        </div>

                        <hr>

                        <a href="" class="readmore stretched-link"><span>Show More</span><i
                                class="bi bi-arrow-right"></i></a>

                    </div>

                </div>
            </div><!-- End post item -->
               @endforeach

            </div>
            </div>
        </div>
@endsection
@section('scripts')
<script>
    var nav = document.querySelector('.fixed-top');
    window.addEventListener('scroll', function () {
        if (window.pageYOffset > 100) {
            nav.classList.add('bg-light', 'shadow');
  
        } else {
            nav.classList.remove('bg-light', 'shadow');
        }
    });
  </script>
  <script src="{{asset('user/js')}}/bootstrap.js"></script> 
@endsection           