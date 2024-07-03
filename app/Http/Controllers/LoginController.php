<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function login(){

        return view('login');
    }



    public function authenticate(Request $request){
         
        $validator = Validator::make($request->all(),[

           'email'=>'required|email',
           'password'=> 'required'

        ]);
        
        if($validator->passes()){
            
            if(Auth:: attempt(['email' => $request->email, 'password'=> $request->password])){
                return redirect()->route('make.dashboard');

            }
            else{
               return redirect()->route('make.login')->with('error','Either password or email incorrect');
            }

        }
        else{
            return redirect()->route('make.login')
            ->withInput()
            ->withErrors($validator);
        }

    }

    public function register(Request $request){

 
        return view('register');
    }


    public function processRegister(Request $request){
        
        $validator = Validator::make($request->all(),[

            'email'=>'required|email|unique:users',
            'password'=> 'required|confirmed'
 
         ]);
         
         if($validator->passes()){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer';
            $user->save();
            // return redirect ()->route('make.login')->with('success','you have registered successfully');
            return  redirect()->route('make.dashboard')->with('success','you have registered successfully');
         }
         else{
             return redirect()->route('make.register')
             ->withInput()
             ->withErrors($validator);
         }
    }
    
    public function logout(){
      
        Auth::logout();
        return redirect()->route('make.login');

    }
    



}
