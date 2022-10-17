<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Advertisment;
use App\Models\category;
use App\Models\Auction;
use App\Models\imege;
use App\Models\price;
use App\Models\auctiontable;
use Illuminate\Http\Request;

class AmountsController extends Controller
{
    //
    public function index()
    {
        $auction=auction::get();
        $info= Price::latest()->get();

        $inf=$info->unique('user_id');
        // $users=User::where ('id',$inf->user_id)->get();
       
        return view('dashboard.admin.auctions.auctionamounts',compact('inf','auction'));
    }
    public function add()
    {
        $auction=auction::get();
           $users=User::get();

        return view('dashboard.admin.auctions.addprice',compact('users','auction'));
    }
    public function store(Request  $request)
    {



    $request->validate([
      
        'price'=>'required|numeric',
        'auction_id'=>'required|exists:auctions,id'
        
     ]);
    
      
            Price::create([

            'user_id'=>$request->user_id,
            'auction_id'=>$request->auction_id,
            'price'=>$request->price,
                  
     
        ]);

        return redirect('admin/advertisment/index');
        
          
            }
    }

