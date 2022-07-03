<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function myprofile()
    {
        $user = User::where('id',2)->get();
        
        return view('profile',compact('user')); 
        return back()->with('message','profile closed');
    }

    public function profileupdate(Request $request)
    {
        $this->validate($request,[
            'firstName'=>'sometimes|string|max:255',
            'lastName'=>'sometimes|string|max:255',
            'mobileNumber'=>'sometimes|numeric|digits:10',
            'address'=>'sometimes|string|max:20',
        ]);


        $user_id = $request->user()->id;
        $user = User::findOrFail($user_id);
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
       $user->mobileNumber = $request->input('mobileNumber');
        $user->address = $request->input('address');



    //     $user->update();
        return redirect()->back()->with('status','Your Profile is Updated');
    }

}
