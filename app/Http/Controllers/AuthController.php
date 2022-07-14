<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProviders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function index()
    {
        return view('login');
    }
    public function registration()
    {
       
        return view('register');
    }


    
    public function register(Request $request)
    {
        $request->validate([
          /* "firstName"=>"required|string:50",
           "usertype"=>"required|string",
            "lastName"=>"required|string:50",
            "index"=>"required|string:50",
            "email"=>"required|email|unique:users",
            "password"=>"required|confirmed",
            "birthdate"=>"required|date_format:Y-m-d|before_or_equal:'today'",
            "birthplace"=>"required:string",
            "requestgrade"=>"required|numeric|max:12",
            "gender"=>"required|string|max:10",
            "school"=>"required|string|max:255",
            "schoolgrade"=>"required|numeric|max:12",
            "fathername"=>"required|string|max:255",
            "f_occupation"=>"required|string|max:50",
            "f_place"=>"required|string|max:255",
            "mothername"=>"required|string|max:255",
            "m_occupation"=>"required|string|max:50",
            "m_place"=>"required|string|max:255",
            "address"=>"required|string|max:255",
            "date_created"=>"required|date_format:Y-m-d",
            "mobileNumber"=>"required|digits:10",
            "admissioncategory"=>"required|string|max:12"*/
         ]);
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->usertype=$request->usertype;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->mobileNumber = $request->mobileNumber;
        $user->save();

       /* return response()->json([
            "status" => 1,
            "message" => "user registered successfully"
        ]);
        */
        
        return redirect('index')->with('message','You have successfully registered in');
        
    }

    public function login(Request $request)
    {
        $request->validate([
            "email"=>"required|email",
            "password"=>"required",
        ]);

        $user = User::where("email","=",$request->email)->first();
        //$user = User::where('email','$request->email')->get();

        if(isset($user->id))
        {
            if(Hash::check($request->password,$user->password))
            {
                $token= $user->createToken("auth_token")->plainTextToken;

               /*  return response()->json([
                    "status"=>1,
                    "message"=>"user loggen in successfully",
                    "access_token"=>$token
                ]); */

                if($user->usertype=='Admin'){

                    return redirect('/admin')->with('success', 'your have successfully logged in'); 

                }elseif($user->usertype=='Student'){

                    //return view('/student',['userId' => $user->id])->with('success', 'your have successfully logged in');
                    return view ('home_page/student_home_uploading',['user' => $user]);

                }elseif($user->usertype=='Teacher'){

                    return redirect('/teacher')->with('success', 'your have successfully logged in');

                }
                  
            }
            else{
                /* return response()->json([
                    "status"=>0,
                    "message"=>"password didnt match"
                ],404); */
                return back()->with('error','password didnt match');
            }
        }else{
                /* return response()->json([
                    "status"=>0,
                    "message"=>"User not found"
                ],404); */
                return back()->with('error','User not found');
            }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('index');
    }
    

}
