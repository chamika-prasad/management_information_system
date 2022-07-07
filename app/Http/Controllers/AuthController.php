<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProviders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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


    
    public function register(Request $request,$id)
    {
       
        // $request->validate([
        //     "firstName"=>"required|string:50",
        //     "usertype"=>"required|string",
        //     "lastName"=>"required|string:50",
        //     "index"=>"required|string:50",
        //     "email"=>"required|email|unique:users",
        //     "password"=>"required|confirmed",
        //     "birthdate"=>"required|date_format:Y-m-d|before_or_equal:'today'",
        //     "birthplace"=>"required:string",
        //     "requestgrade"=>"required|numeric|max:12",
        //     "gender"=>"required|string|max:10",
        //     "school"=>"required|string|max:255",
        //     "schoolgrade"=>"required|numeric|max:12",
        //     "fathername"=>"required|string|max:255",
        //     "f_occupation"=>"required|string|max:50",
        //     "f_place"=>"required|string|max:255",
        //     "mothername"=>"required|string|max:255",
        //     "m_occupation"=>"required|string|max:50",
        //     "m_place"=>"required|string|max:255",
        //     "address"=>"required|string|max:255",
        //     "date_created"=>"required|date_format:Y-m-d",
        //     "mobileNumber"=>"required|digits:10",
        //     "admissioncategory"=>"required|string|max:12"
        //  ]);
         //admin
         if($id==1)
         {
        $user = new User();
        $user->firstName = $request->firstName;
        $user->usertype="Admin";
        $user->lastName =  $request->lastName;
        $user->email = $request->email;
        $user->index = $request->index;
        $user->password = Hash::make($request->password);
        $user->birthdate = '2020-01-01';
        $user->birthplace = "Not Appilcable";
        $user->requestgrade = '0';
        $user->gender = $request->gender;
        $user->school ="Not Appilcable";
        $user->schoolgrade = '0';
        $user->fathername = "Not Appilcable";
        $user->f_occupation = "Not Appilcable";
        $user->f_place = "Not Appilcable";
        $user->mothername = "Not Appilcable";
        $user->m_occupation = "Not Appilcable";
        $user->m_place = "Not Appilcable";
        $user->mobileNumber = $request->mobileNumber;
        $user->address = $request->address;
        $user->admissioncategory = "Not Appilcable";
        $user->save();
        
         }
         //teacher
         elseif($id==2)
         {
            $user = new User();
            $user->firstName =  $request->firstName;
            $user->usertype="Teacher";
            $user->lastName = $request->lastName;
            $user->email = $request->email;
            $user->index = $request->index;
            $user->password = Hash::make($request->password);
            $user->birthdate = '2000-01-01';
            $user->birthplace = "Not Appilcable";
            $user->requestgrade = '0';
            $user->gender = $request->gender;
            $user->school ="Not Appilcable";
            $user->schoolgrade = '0';
            $user->fathername = "Not Appilcable";
            $user->f_occupation = "Not Appilcable";
            $user->f_place = "Not Appilcable";
            $user->mothername = "Not Appilcable";
            $user->m_occupation = "Not Appilcable";
            $user->m_place = "Not Appilcable";
            $user->mobileNumber = $request->mobileNumber;
            $user->address = $request->address;
            $user->admissioncategory = "Not Appilcable";
            $user->save();
         }
         //parent
         else if($id==4)
         {
        $user = new User();
        $user->firstName = $request->firstName;
        $user->usertype="Parent";
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->index =$request->index;
        $user->password = Hash::make($request->password);
        $user->birthdate = '2000-01-01';
        $user->birthplace = "Not Appilcable";
        $user->requestgrade = '0';
        $user->gender = $request->gender;
        $user->school = "Not Appilcable";
        $user->schoolgrade = '0';
        $user->fathername = "Not Appilcable";
        $user->f_occupation = "Not Appilcable";
        $user->f_place = "Not Appilcable";
        $user->mothername = "Not Appilcable";
        $user->m_occupation = "Not Appilcable";
        $user->m_place = "Not Appilcable";
        $user->mobileNumber = $request->mobileNumber;
        $user->address = $request->address;
        $user->admissioncategory = "Not Appilcable";
        $user->save();

         }
         elseif($id==3){
         $user = new User();
        $user->firstName = $request->firstName;
        $user->usertype="Student";
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->index = $request->index;
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
        $user->mobileNumber = $request->mobileNumber;
        $user->address = $request->address;
        $user->admissioncategory = $request->admissioncategory;
        $user->save();
       
         }
        return redirect('index')->with('success','You have successfully registered in');
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

               
                // return redirect('dashboard')->with('success', 'your have successfully logged in');  
                if($user->usertype=='Admin'){
                return view('home_page/admin_home_uploading',compact('user'));
                }else if($user->usertype=='Student')
                {
                return view('home_page/student_home_uploading',compact('user'));
                }else if($user->usertype=='Parent')
                {
                return view('home_page/student_home_uploading',compact('user'));
                }
                else if($user->usertype=='Teacher')
                {
                return view('home_page/teacher_home_uploading',compact('user'));
                }
 
            }
            else{
               
                return back()->with('error','password didnt match');
            }
        }else{
                
                return back()->with('error','User not found');
            }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('index');
    }

    public function usertype(Request $request){
        if($request->user==1){

            return view('adminSignup',['user'=>$request->user]);

        }elseif($request->user==2){
          
            
            return view('teacherSignup',['user'=>$request->user]);
            
        }elseif($request->user==3){
           

            return view('studentSignup',['user' => $request->user]);
            //i have changed user_type into user
            
        }elseif($request->user==4){

            return view('parentSignup',['user'=>$request->user]);
            
        }

    }
   

}
