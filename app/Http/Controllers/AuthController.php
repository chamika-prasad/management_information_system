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
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }


    
    public function register(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|confirmed",
            "birthdate"=>"required|date_format:Y-m-d",
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
            "phone1"=>"required|digits:10",
            "phone2"=>"required|digits:10",
            "emergencyContact"=>"required|digits:10",
            "admissioncategory"=>"required|string|max:12",
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->birthdate = $request->birthdate;
        $user->birthplace = $request->birthplace;
        $user->requestgrade = $request->requestgrade;
        $user->gender = $request->gender;
        $user->school = $request->school;
        $user->schoolgrade = $request->schoolgrade;
        $user->fathername = $request->fathername;
        $user->f_occupation = $request->f_occupation;
        $user->f_place = $request->f_place;
        $user->mothername = $request->mothername;
        $user->m_occupation = $request->m_occupation;
        $user->m_place = $request->m_place;
        $user->phone1 = $request->phone1;
        $user->phone2 = $request->phone2;
        $user->emergencyContact = $request->emergencyContact;
        $user->address = $request->address;
        $user->date_created = $request->date_created;
        $user->admissioncategory = $request->admissioncategory;
        $user->save();

        return response()->json([
            "status" => 1,
            "message" => "user registered successfully"
        ]);
        /*
        return redirect("login")->withSuccess("You have successfully logged in");
        */
    }

    public function login(Request $request)
    {
        $request->validate([
            "email"=>"required|email",
            "password"=>"required",
        ]);

        $user = User::where("email","=",$request->email)->first();

        if(isset($user->id))
        {
            if(Hash::check($request->password,$user->password))
            {
                $token= $user->createToken("auth_token")->plainTextToken;

                return response()->json([
                    "status"=>1,
                    "message"=>"user loggen in successfully",
                    "access_token"=>$token
                ]);
            }
            else{
                return response()->json([
                    "status"=>0,
                    "message"=>"password didnt match"
                ],404);
            }
        }else{
                return response()->json([
                    "status"=>0,
                    "message"=>"User not found"
                ],404);
            }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('/login');
    }
    

}
