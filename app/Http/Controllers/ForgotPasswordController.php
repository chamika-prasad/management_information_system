<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use DB;
use Carbon\Carbon;
use App\Models\User;
//use App\Mail\ResetPassword;
//use Illuminate\Support\Facades\Mail;
use Mail;
use Hash;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    //
    public function showForgetPasswordForm()
    {
        return view('forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users',
        ]);
        //new
       $email = $request->input('email');
        if(User::where('email',$email)->doesntExist())
        {
            return response([
                'message'=>'user doesnt exist'
            ],404);
        }
        //
        $token = Str::random(64);
        //new try and exception parrt
      //try{
        DB::table('password_resets')->insert([
            //'email'=>$request->email, new
            'email'=>$email,
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);
      /* return response([
            'message'=>'Check your email'
        ]);*/
        /*Mail::send('email.forgetPassword',['token'=>$token],function($message) use ($request)
        {
            $message->to($request->email);
            $message->subject('Reset Password');
        });*/
        
        /*return response([
            'message'=>'Check your email'
        ]);
    }catch(\Exception $exception)
    {
        return response([
            'message'=>$exception->getMessage()
        ],400);
    }*/
    //Mail::to($request->all()['email']->send(new ResetPassword($token)));
   // copy and paste in upper
    Mail::send('email.forgetPassword',['token'=>$token],function($message) use ($request)
        {
            $message->to($request->email);
            $message->subject('Reset Password');
        });  
        //Mail::to(['token'=>$token],function($message) use($request)
       /* use for api //Mail::to($request->email)->send(['token'=>$token],function($message) use ($request)
        {
            $message->to($request->email);
            $message->subject('Reset Password');
        });*/
        


        return back()->with('message','we have e-mailed your password reset link');
    }

   public function showResetPasswordForm($token)
    {
        return view('forgetPasswordLink',['token'=>$token]);
    }
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users',
           // 'token'=>'required',
            'password'=>'required|string|confirmed',
            'password_confirmation'=>'required'
        ]);
        $updatePassword=DB::table('password_resets')
                        ->where([
                            'email'=>$request->email,
                            'token'=>$request->token
                        ])
                            ->first();

        if(!$updatePassword)
        {
            return back()->with('message','Invalid token');
            //new
            /* return response([
                'message'=>'Invalid token'
            ],400); */
        }

        $user = User::where('email',$request->email)
                ->update(['password'=>Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=>$request->email])->delete();
       /*  return response([
            'message'=>'success'
        ]);
         */
       return redirect('index')->with('message','Your password has been changed');
                    }
}
