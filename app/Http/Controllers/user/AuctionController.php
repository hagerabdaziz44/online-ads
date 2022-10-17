<?php

namespace App\Http\Controllers\user;
use App\Models\Auction;
use App\Http\Controllers\Controller;
use App\Models\auctiontable;
use App\Models\Price;
use App\Models\category;
use App\Models\User;
USE Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Rules\PriceValidation;
use App\Rules\DateValidation;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class AuctionController extends Controller
{
//////////////////////////////////////////////show auction
public function index(){
    $auction=Auction::where('user_id', auth()->id())->get();
    return view('dashboard.user.auction.index',compact('auction'));
}

//////////////////////////////////// end show auction
/////////////////////////////////////////////////show in response
public function fetchauction()
{        $id = Auth::id();
    $auction = Auction::where('user_id',$id)->get();
    
    // $images=Imege::where('advertisment_id',$advertisment->id)->get();
    if( $auction )
    {
        return Response::json(array(
          
            'auction'=>$auction,
            // 'images'=>$images,
        ));
    
    }
 
}
// /////////////////////////////////////////////////end show in response
///////////////////////////////////////////create auction
    public function create(){

        return view('dashboard.user.auction.create');
    }

    public function store(Request $request){
    $start=$request->start_date;
    $end=$request->end_date;
   $request->validate([
   'name'=>'required|string|max:100',
   'desc'=>'required|string|max:600',
   'start_date'=>'required|date_format:"Y-m-d H:i:s"',
   'end_date'=>['required','date_format:"Y-m-d H:i:s"','after:start_date',new DateValidation($start,$end)],
   'img'=>'required|image|mimes:jpg,png,jpeg',
   'min_price'=>'required|numeric',
   'condition'=>'required',
   'address'=>'required']);
   $newname=$request->img->hashName();
   Image::make($request->img)->resize(612,408)->save(public_path('Uploads/auctions/'.$newname));
    $request->img=$newname;
   $newauction=Auction::create([
       'user_id'=>Auth()->id(),
       'name'=>$request->name,
       'desc'=>$request->desc,
       'start_date'=>$request->start_date,
       'end_date'=>$request->end_date,
       'img'=>$request->img,
       'min_price'=>$request->min_price,
       'condition'=>$request->condition,  
       'address'=>$request->address]);
     if($request->has('imgs')){
     foreach($request->file('imgs')as $image){

    $imagename ='auction.'.uniqid() .'.'.$image->getClientOriginalExtension();
    $image_resize = Image::make($image)->fit(1920,1080)->save(public_path('Uploads/auctions/'.$imagename));
        auctiontable::create([
            'auction_id'=>$newauction->id,
            'image'=>$imagename
        ]);
    }
}
if($newauction)
{
    return redirect('user/auction/index');
}
    else{  return back()->with('fail');
}
// return redirect('user/auction/index');
}

/////////////////////////////////end create auction
/////////////////edit auction
public function edit($id){
  $auction= Auction::findOrfail($id);
  $images=auctiontable::where('auction_id',$id)->get();
  if( $auction)
  {
      return Response::json(array(
          'status'=>200,
          'auction'=>$auction,
          'images'=>$images,
          
      ));
  }
  
  else
  {
      return response()->json( [
          
          'status'=>404,
          
          'auction'=>'not found',
        
      
      ]);
}
}
///////////////////////////////////////////////////end edit auction///////////




###################update function#############
public function update ( Request $request,$id)
{
    // validation
    $validator=Validator::make($request->all(),[
        'name'=>'required|string|max:100',
        'desc'=>'required|string|max:500',
        'img'=>'nullable|image|mimes:jpg,png,jpeg',
        'min_price'=>'required|numeric',
        'condition'=>'required|string',
        'start_date'=>'required',
        'end_date'=>'required',
        'is_active'=>'nullable',
 ]);
if($validator->fails())
    {
        return response()->json( [
        
            'status'=>400,
            'errors'=>$validator->messages()]);}
else{
    $auc=Auction::findOrfail($id);
  if($auc){

        $auc->name = $request->input('name');
        $auc->desc = $request->input('desc');
        $auc->min_price = $request->input('min_price');
        $auc->condition = $request->input('condition');
        $auc->start_date = $request->input('start_date');
        $auc->end_date = $request->input('end_date');
        if (!$request->has('is_active')){
            $request->request->add(['is_active' => 0]);

        }
        else{
            $request->request->add(['is_active' => 1]);

        }
        $auc->is_active =$request->is_active;

        // cover
    $old_name=Auction::findOrfail($request->id)->img;
    if($request->hasFile('img')){
    //  Storage::disk('Uploads')->delete('Advertisments/'.$old_name);
     unlink(public_path('Uploads/auctions/').$old_name);
     $new_name=$request->img->hashName();
     Image::make($request->img)->resize(612,408)->save(public_path('Uploads/auctions/'.$new_name));
     $auc->img=$new_name;
    }
    else{
   
    $auc->img= $old_name;
   }
//    end cover

$auc->save();

if($request->has('imgs')){
     
    foreach($request->file('imgs')as $image){
     $imagename ='auction.'.uniqid() .'.'.$image->getClientOriginalExtension();
      $image_resize = Image::make($image)->fit(1920,1080)->save(public_path('Uploads/auctions/'.$imagename));
            auctiontable::create([
                'auction_id'=>$request->id,
                'image'=>$imagename
            ]);
        }
    }
return response()->json( [
    
    'status'=>200,
    'message'=>'success',
    
]); 

    }
else
{
return response()->json( [
    
    'status'=>404,
    'message'=>'fail',
    
]); 
 
}


}}

#########################end update auction########################3


########################################delete sub img x############
public function deleteimage($id){
    $old_name=auctiontable::findOrfail($id)->image;
    unlink(public_path('Uploads/Auctions/').$old_name);
    auctiontable::findOrfail($id)->delete();
 return back();

}
########################################delete sub img x ############

////****DELETE button */
public function delete($id){
    $old_name=Auction::findOrfail($id)->img;
    if($old_name){
    // Storage::disk('Uploads')->delete('Auctions/'.$old_name);
    unlink(public_path('Uploads/Auctions/').$old_name);

    $old_names =auctiontable::where('auction_id',$id)->get();
    foreach ($old_names as $oldd) {
        unlink(public_path('Uploads/Auctions/').$oldd->image);
        auctiontable::where('auction_id',$id)->delete();
    }
   Auction::findOrfail($id)->delete();
   return response()->json([
    'status'=>200,
    'message'=>'Student Deleted Successfully.'
     ]);

    }
    else{
        return response()->json([
            'status'=>500,
            'message'=>'No Student Found.'
        ]);
    }



}


public function last_price($id){
    $date['category']=Category::get();
    $auction=Auction::findOrfail($id);
    $count = Price::where('auction_id',$id)->count();

//  dd($count);
//  $price=Auction::where('id','auction_id')->first();
 $min_price=$auction->min_price;
 $maxprice= Price::where('auction_id',$id)->max('price');
//  dd($maxprice);

if ($count == 0 )
{
return $min_price;
}
else
{
  return $maxprice;
}
 }

public function get_precentage($id){
    $date['category']=Category::get();
    $auth_id = Auth::id();
    $auction=Auction::findOrfail($id);
    $current_date=Carbon::now()->timezone('Africa/Cairo');
    // $created_at=price::where('auction_id',$id)->where('user_id',$auth_id )->first(); 
    $c_value=Carbon::parse($current_date)->toDateTimeString();
    $c = carbon::createFromFormat('Y-m-d H:i:s', $c_value );
    $end_date = Carbon::parse($auction->end_date)->toDateTimeString();
    $end = carbon::createFromFormat('Y-m-d H:i:s', $end_date );
    $different_Milliseconds = $end->diffInRealMilliseconds($c);
   
   
     return $different_Milliseconds;
   

}


//***show  selected auction */
public function show ($id)
{   
    $category=Category::get();
    $data['count'] = Price::where('auction_id',$id)->distinct('user_id')->count();
    $data['images']=auctiontable::where('auction_id',$id)->get();

    $auth_id = Auth::id();
    //////////////////////////check is active/////////////////////////////////////////////////////////////////////////
    $auction=Auction::findOrfail($id);
    $current_date=Carbon::now()->timezone('Africa/Cairo');
    // $c_value=Carbon::parse($current_date)->toDateTimeString();
   $end=$auction->end_date;
  
        $result = $current_date->gt($end);
        
        if($result)
        {
    
        Auction::findOrfail($id)->update([
            'is_active'=>'0',
        ]);
    }
    //////////////////////////////////////end check////////////////////////////////////////////////////////////////////////////////////////////////
    $data['auction']=Auction::findOrfail($id);
    
    
    $data['price']=price::where('user_id',$auth_id)->where('auction_id',$id)->first();
     $cccc= price::count();

     if($cccc==0){
        $data['last_price']= $this->last_price($id); 
        // dd($last_pric);

     }else{
        $auth_id = Auth::id();
        $exsit= price::where('auction_id',$id)->where('user_id',auth()->id())->first();
        // dd($exsit);
        $data['images']=auctiontable::where('auction_id',$id)->get();
        if ($exsit ){
            $data['last_price']= $this->last_price($id); 
            
           $data['f_prcentag']= $this->get_precentage($id);

        //    dd( $data['f_prcentag']);
 
         }
         else{
             
            $data['last_price']= $this->last_price($id);  
            // dd($data['last_price']);
         }
     }
    
    
   return view ('dashboard.user.auction.show',compact('category'),with($data));
}


public function join (Request $request)
{
    $date['category']=Category::get();
    $id=$request->auction_id;
    $request->validate([
        'auction_id'=>'required|exists:auctions,id',
        'price'=> ['required','numeric', new PriceValidation ($id)],
       
        
     ]);
     $count = Price::where('auction_id',$request->auction_id)->distinct('user_id')->count();
          $price=Auction::where('id',$request->auction_id)->first();
     $min_price=$price->min_price;
     $maxprice= Price::where('auction_id',$request->auction_id)->max('price');
    
        
        
    
       if( $request->price > $maxprice and ($request->price > $min_price))
       {
            Price::create([

            'user_id'=>Auth()->id(),
            'auction_id'=>$request->auction_id,
            'price'=>$request->price,
                  
     
        ]);

        return back();
        }
        else{
            
            return back()->with('fail');
               }
            }

               public function bidders_info($id){
                $auction=auction::findOrfail($id)->get();
                $info= Price::where('auction_id',$id)->latest()->get();

                $inf=$info->unique('user_id');
                // $users=User::where ('id',$inf->user_id)->get();
                return view ('dashboard.user.auction.bidders',compact('inf','auction'));
                
         
           }

           public function bidders_jion(){
              $joinners=Price::where('user_id',auth()->id())->get();
              return view('dashboard.user.auction.bidders_join',compact('joinners'));
           }


           public function images($id){
            $advertisment = Auction::find($id);
          
            $images=auctiontable::where('auction_id',$id)->get();
           
           return view('dashboard.user.auction.show',compact('images','advertisment'));
       }


public function disenroll ($id){
    $auth_id = Auth::id();
  $enroll_info=price::where('auction_id',$id)->where('user_id',$auth_id )->get();
  foreach($enroll_info as $info){

    price::where('auction_id',$id)->where('user_id',$auth_id )->delete();
  }
  return back();

}
###################add to wishlist function##########
public function addtowishlist(Request $request)
{
     
    $request->validate( [
        'auction_id' => 'exists:auctions,id'
    ]);
   
    $users=User::where('id',Auth()->id())->first();
 
   $fav=$users->auction()->where('auction_id',$request->auction_id)->count();

    if ($fav == 0) {
        $users=User::where('id',Auth()->id())->first();
   
        $users->save();
        $auction=Auction::first();
        $users=$users->auction()->attach(['auction_id'=>$request->auction_id]);}


     else {
        $users=User::where('id',Auth()->id())->first();
   
      
        $auction=Auction::first();
        $users=$users->auction()->detach(['auction_id'=>$request->auction_id]);}

    return back();

}
#######################show favoriets###############
public function favoriets()

{ 
    // $advertisment=Advertisment::get();
    $users=User::where('id',Auth()->id())->first();
    $favoriets=$users->auction()->get();
    
    return view('dashboard.user.auction.favorites',compact('users'));
}

public function search( Request $request)
{    $id = Auth::id();
    $keyword=$request->keyword;
    $Auction=Auction::where('name','like',"%$keyword%")->get();
  
    return response()->json( $Auction);
    
// dd($advertisments);
   
}

       

}




