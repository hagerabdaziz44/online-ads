<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Advertisment;
use App\Models\category;
use App\Models\Auction;
use App\Models\imege;
use App\Models\price;
use App\Models\auctiontable;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.index');
    }
    public function counter()
    {
        $user=User::count();
        $category=Category::count();
        $advertisment=advertisment::where('is_accepted','1')->count();
        $auction=auction::where('is_accepted','1')->count();

        return response()->json( [
        
            'auction'=>$auction,
            'user'=> $user,
            'category'=>$category,
            'advertisment'=> $advertisment,
            
        ]); 

        // return view ('dashboard.admin.index',compact('user','category','advertisment','auction'));
    }
    public function pendding_ad()
    {
        $advertisment=advertisment::where('is_accepted','0')->with('category')->get();
        if($advertisment)
        {    return response()->json([
          
            'advertisment'=>$advertisment
        ]);} 

    }
    public function pendding_auction()
    {
        $auction=auction::where('is_accepted','0')->get();
        if($auction)
        {    return response()->json([
          
            'auction'=>$auction
        ]);} 

    }
    //acceptads
    public function accept($id){
        $ad=Advertisment::findOrfail($id);
        if($ad){
           $ad ->update([
                'is_accepted'=>'1',
      
              ]);
              return response()->json( [
        
                'status'=>200,
                'message'=>'success',
                
            ]); 


        }
    }
         //end acceptads
         //accept auctuin
         public function accept_auction($id){
            $au=auction::findOrfail($id);
            if($au){
               $au->update([
                    'is_accepted'=>'1',
          
                  ]);
                  return response()->json( [
            
                    'status'=>200,
                    'message'=>'success',
                    
                ]); 
    
    
            }
        }

         //end accept auction
         //delete ads
         public function cancle($id)
         
         {
            $Advertisment = Advertisment::find($id);
            if($Advertisment)
            {    //delete imgs
                $old_name=Advertisment::findOrfail($id)->img;
          
                unlink(public_path('Uploads/Advertisments/').$old_name);
            
                $old_names =Imege::where('advertisment_id',$id)->get();
                foreach ($old_names as $oldd) {
                    unlink(public_path('Uploads/Advertisments/').$oldd->image);
                    Imege::where('advertisment_id',$id)->delete();}
               //delete sub-imgs
                $Advertisment->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'Student Deleted Successfully.'
                ]);
        
        
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No advertisment Found.'
                ]);
            }
           
        }
       
    
         
         //enddelete ads
         //delete auction
         public function cancle_auction($id)
         { 
            $au=  Auction::findOrfail($id);
            if($au){
            $prices=price::where('auction_id',$id)->get();
            foreach($prices as $price)
            {
                price::where('auction_id',$id)->delete();
        
            }
            
         //delete subimage
            $old_names =auctiontable::where('auction_id',$id)->get();
            foreach ($old_names as $oldd) {
                unlink(public_path('Uploads/Auctions/').$oldd->image);
                auctiontable::where('auction_id',$id)->delete();}
            //delete auction and cover image
                $old_name=Auction::findOrfail($id)->img;
               unlink(public_path('Uploads/Auctions/').$old_name);
               $au->delete();
               return response()->json([
                'status'=>200,
                'message'=>'Student Deleted Successfully.'
            ]);
            

            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No auction Found.'
                ]);
            }
           

         }
         //end delete auction

    function check (Request $request){
        $request->validate(
            [
                'email'=>'required|email|exists:admins,email',
                'password'=>'required|min:5|max:30',
        
            ]);
            $creds=$request->only('email','password');
            if(Auth::guard('admin')->attempt($creds))
            {
                return redirect('admin/index');}
            else{
                return redirect()->route('admin.login')->with('fail','Incorrect credentials');
            }
 
     }
     public function logout()
     {
 
        Auth::guard('admin')->logout();
      return view('dashboard.admin.login');
        
   
     }
 
}
