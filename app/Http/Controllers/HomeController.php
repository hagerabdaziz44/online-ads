<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Auction;
use App\Models\category;
use App\Models\Advertisment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $Advertisment=Advertisment::orderBy('id','Desc')->take(6)->get();
        $category=Category::get();
        // dd($Advertisment);
        $Auction=Auction::where('start_date','<=',Carbon::now())->where('is_active','1')->where('is_accepted','1')->orderBy('id','Desc')->take(6)->get();
        return view('home.mainhome',compact('Advertisment','Auction','category'));
    }
    public function cat()
    {
        $category=Category::get();
        return view('home.inc.header',compact('category'));  
    }
public function show($id)
{
    $category=Category::get();
    $ads=Advertisment::where('category_id',$id)->get();
return view ('home.categories.show',compact('ads','category'));
}

}
