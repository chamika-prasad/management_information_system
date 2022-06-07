<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreeApplication;

class FreeLearningController extends Controller
{
    
    public function addFreeLearning(Request $request,$Id){

        $freeapplication = new FreeApplication();

        $freeapplication->user_id = $Id;
        $freeapplication->description = $request->description;
        $freeapplication->save();
        return redirect('/');
    }


    public function displayFreelearningList(){

        $FreeApplications = FreeApplication::all();//get all element in free learning application model
        return view('payment/admin_free_learning_application_list',['FreeApplications' => $FreeApplications]);
    }

    public function adminFreelearning($id){

        $user_applications = FreeApplication::where('user_id', $id)->get();
        return view('payment/admin_free_learning_approve',compact('user_applications'));
    }

}
