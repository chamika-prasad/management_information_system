<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
      
    public function myprofile()
    {
        $user = User::where('id',2)->get();
        
        return view('profile',compact('user')); 
        // return back()->with('message','profile closed');
    }

    public function profileupdate(Request $request)
    {

       $this->validate($request,[
            'firstName'=>'sometimes|string|max:255',
            'lastName'=>'sometimes|string|max:255',
            'mobileNumber'=>'sometimes|numeric|digits:10',
            'address'=>'sometimes|string|max:20',
        ]);

        session_start(); 
        $id = $_SESSION['id'];
        $user = User::find($id);
        $_SESSION['firstName'] = $request->input('firstName');
        $user->firstName =  $_SESSION['firstName'];
        $_SESSION['lastName'] = $request->input('lastName');
        $user->lastName = $_SESSION['lastName'];
        $_SESSION['mobileNumber']  = $request->input('mobileNumber');
        $user->mobileNumber = $_SESSION['mobileNumber'];
        $_SESSION['address'] = $request->input('address');
        $user->address = $_SESSION['address'];
     


          $user->update();
          return redirect('/my_profile')->with('status','Your Profile is Updated');
 
    }

}
