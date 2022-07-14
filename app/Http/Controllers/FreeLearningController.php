<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreeApplication;

class FreeLearningController extends Controller
{

    public function userView($id){

        return view ('home_page/student_home_uploading',['id' => $id]);

    }

    public function userfreelearningView($id){
        
        $users = User::where('id',$id)->first();
        return view ('payment/free_learning_application',['users' => $users]);

    }
    
    public function addFreeLearning(Request $request,$Id){

        $freeapplication = new FreeApplication();

        $freeapplication->user_id = $Id;
        $freeapplication->description = $request->description;
        $freeapplication->save();
        return view('home_page/student_home_uploading');
    }


    public function displayFreelearningList(){

        $freeApplications = FreeApplication::all();//get all element in free learning application model
        return view('payment/admin_free_learning_application_list',['freeApplications' => $freeApplications]);
    }

    public function adminFreelearning($id){
        
        $user_applications = FreeApplication::where('user_id',$id)->get();
        return view('payment/admin_free_learning_approve',['user_applications' => $user_applications]);
    }

    public function adminFreeLearningAction($action,$user_id){
        $freeApplications = FreeApplication::all();//get all element in free learning application model
        $user_application = FreeApplication::where('user_id',$user_id)->first();

            $user_application->approved = $action;
           
            $user_application->save();
            
            return view('payment/admin_free_learning_application_list',['freeApplications' => $freeApplications]);

    }

}
