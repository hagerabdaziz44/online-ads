@extends('dashboard.user.layout')
@section('content')

<div class="main-content favoriteContents "  >




               

    <div class="row gy-4 container favoriteContent " data-aos="fade-left">
        @foreach ($users->auction as $us) 

        <div class="col-lg-3 col-md-6 favoritedata" data-aos="zoom-in" data-aos-delay="100">
            <div class="card cardf" style="width: 18rem;">
                <img src="{{asset("Uploads/auctions/$us->img")}}"class="card-img-top" alt="...">
                <div class="card-body favotiteF">
                    <span> <a href="#" class="like " aria-hidden="true" style=" font-size: 1.2em;"><i
                                class="bi bi-heart-fill"></i></a></span>
                    <h5 class="card-title  ">{{$us->title}}
                    </h5>

                    <p class="card-text">
                        {{$us->desc}}</p>

                    <h6>{{$us->price}}</h6>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
        
        @endsection