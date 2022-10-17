
@extends('dashboard.user.layout')
@section('title')
Auction
@endsection
@section('content')



<div class="container " style="background-color: white">


    <div class="tab-content">
        <div class="tab-pane active m-1 " id="All">


            <div class="row border g-0 rounded shadow-sm">
                <!-- column -->
                <div class="col-12  text-center  ">

                    <table class="table   " style="background-color: white" >
                        <thead class="thu">
                            <tr class="">

                                <th scope="col">Auction Name</th>
                                <th scope="col">User name</th>
                                
                                <th scope="col">Price</th>
                                <th scope="col">phone</th>
                               

                            </tr>

                        </thead>
                        <tbody id="allbooks">
                            @foreach ($inf as $in)
                            <tr>

                                <td>{{$in->auction->name}}</td>
                                <td>{{$in->user->first_name}} {{$in->user->last_name}} </td>
                                <td>{{$in->price}}</td>
                                <td>{{$in->user->phone}}</td>
                            </tr>
                            @endforeach

                      
                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>



</div>
@endsection