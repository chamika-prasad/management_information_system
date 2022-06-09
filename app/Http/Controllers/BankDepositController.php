<?php

namespace App\Http\Controllers;
use App\Models\Payment;

use Illuminate\Http\Request;
use Validator;

class BankDepositController extends Controller
{
    public function upload(Request $request,$user_id){


        $name = $request->file('image')->getClientOriginalName();
        $exten = $request->file('image')->getClientOriginalExtension();


        if($exten == 'JPEG' || $exten == 'JPG' || $exten == 'PNG' || $exten == 'png' || $exten == 'jpg' || $exten == 'jpeg'){
            
            $request->file('image')->storeAs('public/images/',$name);
            $payment = new Payment;
            $payment->user_id = $user_id;
            $payment->amount = $request->amount;
            $payment->type = 'Bank_Deposit';
            $payment->approved = 0;
            $payment->slipName = $name;
            $payment->save();
            return redirect('/');
        }else{

            return redirect()->back()->with('message', 'file type is incorrect');
        }


        
        }

    //}
}
