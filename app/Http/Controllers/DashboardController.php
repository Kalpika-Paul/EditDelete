<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showroom;

class DashboardController extends Controller
{
    public function index(){
        return view ('dashboard');
    }

     
    public function showroom(){
        
        $showrooms = Showroom::all();
        return view ('showroom',compact('showrooms'));
       
    }



    public function newshowroom (){
        return view ('newshowroom');
    }
   
    public function store (Request $request)
    {
        // dd($request);


        // return $request;
        $data = new Showroom;  
        //for new object/data
       
        $data->name = $request->name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->map = $request->mapaddress;
        $data->area = $request->area;
        $data->save();

        return redirect(route('make.showroom'))->with('success', 'Updated Successfully');

    //     $data = $request->validate([
           
    //         'name'=>'required',
    //         'address'=>'required',
    //         'phone'=>'required',
    //         'email'=>'required|email',
    //         // 'mapaddress'=>'required',
    //         'area'=>'required'


    //     ]);


    //      $newShowroom = Showroom::create($data);
     
    //      if ($newShowroom) 
    // {

    //     return redirect(route('make.showroom'))->with('success', 'Showroom created successfully');
    // }  
    
    // else {
    //     return redirect()->back()->with('error', 'Failed to create Showroom ');
    // }
       
    }


    public function edit(Showroom $showroom) {
        // dd($category);
        return view('edit', compact('showroom'));

        
    }

    public function update( $id, Request $request)
    {
        
        // return  $id;
        // $data = $request->validate([
        //     'name' => 'required',
        //     'address' => 'required',
        //     'phone' => 'required',
        //     'email' => 'required|email',
        //     'area' => 'required'
        // ]);
        //  $category->update($data);

        $showroom = Showroom::find($id);
       //for update the existing data
        $showroom->name = $request->name;
        $showroom->address = $request->address;
        $showroom->phone = $request->phone;
        $showroom->email = $request->email;
        $showroom->map = $request->mapaddress;
        $showroom->area = $request->area;
        $showroom->save();
       
       
     return redirect(route('make.showroom'))->with('success', 'Updated Successfully');
        
     // return 'Hello';
    }

    public function destroy(Showroom $showroom ){
       
        $showroom->delete();
        return redirect (route('make.showroom'))->with('success','product deleted successfully');
       }


}




