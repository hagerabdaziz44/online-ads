<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\category;
use App\Models\Advertisment;
use App\Models\imege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;

class CategoriesController extends Controller
{
    public function fetchcategory()
{
   
    $categories=category::get();
    
    
    if( $categories )
    {
        return Response::json(array(
            'categories'=>$categories,
            
        ));
       
    }

}
    //
    public function index()
    {
        $categories=category::get();
        return view ('dashboard.admin.categories.index',compact('categories'));
    }
  
    public function store(request $request)
    {
        
            $request->validate(
                [
                    'name'=>'required|string|min:2|max:50',
                    'desc'=>'required|string|min:2|max:100',
                ]
                );
                if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);
    
            if (!$request->has('is_accepted'))
                $request->request->add(['is_accepted' => 0]);
            else
                $request->request->add(['is_accepted' => 1]);
               $categories= category::create([
                    'name' => $request->name,
                    'desc'=>$request->desc,
                    'is_accepted' => $request->is_accepted,
                    'is_active' => $request->is_active
                ]);
                return redirect('admin/categories/index');
                //   if( $categories)
                //   {
                //     return back()->with('success','category created successfully');
                //   }

                //  return back()->with('fail','Something went wrong, failed to create');



    }
    public function edit($id)
    {
        $categories=category::findOrfail($id);
        if( $categories )
        {
            return Response::json(array(
                'categories'=>$categories,
                
            ));
           
        }

      
    }
    public function update (request $request,$id)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|min:2|max:50',
            'desc'=>'required|string|min:2|max:100',
        ]);
        if($validator->fails())
        {
            return response()->json( [
            
                'status'=>400,
                'errors'=>$validator->messages()
                
            ]); 
        }
        else{
    
            $ad=category::findOrfail($id);
            if($ad){
                if (!$request->has('is_active')){
                    $request->request->add(['is_active' => 0]);
                }
               
                else{
                    $request->request->add(['is_active' => 1]);
                }
                if (!$request->has('is_accepted')){
                    $request->request->add(['is_accepted' => 0]);
                }
               
                else{
                    $request->request->add(['is_accepted' => 1]);
                }
                $ad->name = $request->input('name');
                $ad->desc= $request->input('desc');
                $ad->is_active=$request->is_active;
                $ad->is_accepted=$request->is_accepted;   
                $ad->save();     

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
                 
             }}
                  

    
    
    
    
    
    
                }
    public function delete ($id)
    {
        $categories=category::findOrfail($id);
        if($categories){
        $ads=Advertisment::where('category_id',$id)->get();
        foreach ($ads as $ad) {
           
           
            // cover
            unlink(public_path('Uploads/Advertisments/').$ad->img);
            
            // sub
            $old_names =Imege::where('advertisment_id',  $ad->id)->get();
            foreach ($old_names as $oldd) {
                unlink(public_path('Uploads/Advertisments/').$oldd->image);
                Imege::where('advertisment_id', $ad->id)->delete();
            }
            Advertisment::where('id',$ad->id)->delete();
        }
            $categories->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Student Deleted Successfully.'
            ]);
    
       
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Student Found.'
                ]);
            }
        
       
      
        
        
    }
    public function search( Request $request)
    {
        $keyword=$request->keyword;
        $categories=Category::where('name','like',"%$keyword%")->get();
      
        return response()->json( $categories);
        
    
    
    
    }
}
