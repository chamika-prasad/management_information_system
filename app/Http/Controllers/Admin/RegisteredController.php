<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisteredController extends Controller
{
    //show registered users page in admin pannel
    public function index(){
        $users = User::all();
        return view('auth.registereduser')->with('users',$users);
    }

    //show edit user roles page in admin pannel
    public function edit($id){
        $user_roles = User::find($id);
        return view('auth.edituser')->with('user_roles', $user_roles);
    }

    //update user roles according to requested id user id
    public function updaterole(Request $request, $id){
        $user = User::find($id);
        $user->usertype = $request->input('roles');
        // $user->isban = $request->input('isban'); Ive deleted this 
        $user->update();

        return redirect()->back()->with('status','Role is Updated');
    }

    //delete registered user according to the passed user id
    public function registerdelete($id){
        $users = User::findOrFail($id);
        $users->delete();
        

        return redirect()->back()->with('status','User is Deleted');
    }
}
