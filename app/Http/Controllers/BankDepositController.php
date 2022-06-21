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


        if($exten == 'JPEG' || $exten == 'JPG' || $exten == 'PNG' || $exten == 'png' || $exten == 'jpg' || $exten == 'jpeg' )
        {

            if($request->amount>0){}

            if($request->amount >= 0){
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
                return redirect()->back()->with('message', 'enter valide value');
            }
            
            
        }else{

            return redirect()->back()->with('message', 'file type is incorrect');
        }


        
        }

    public function displayBankDepositList(){

        $bankdeposits = Payment::where('type','Bank_Deposit')->get();//get all element in free learning application model
        return view('payment/admin_bank_deposit_list',['bankdeposits' => $bankdeposits]);
    }

    public function adminBankdeposit($id){
        
        $user_bankslips = Payment::where('user_id',$id)->get();
        return view('payment/admin_bank_deposite_approve',['user_bankslips' => $user_bankslips]);
    }
}
