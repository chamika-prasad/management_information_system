<?php
    
namespace App\Http\Controllers;
use App\Models\StripePayment;
use PDF;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Storage;    
use Illuminate\Http\Request;
use Session;
use Stripe; 
use Exception;
    
class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('payment/stripe');
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {

        try{        
        
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create (
                [
                "amount" => ($request->amount) * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "testing payment",
                "receipt_email" => 'chamikap40@gmail.com',
                "metadata" => ["user" => "chamika"]
            ]
            );

            Session::flash('success', 'Payment successful!');
            $user=5;

            $date=date('Y-m-d');

            return view('invoice',['user'=>$user,'amount'=>$request->amount,'date'=>$date]);
           
            return back();
        } catch(Exception $e)
        {

            return redirect()->back()->with('message', 'Invalid card or insuccessfull balance');

        }

    }

    public function exportPdf(){
        
        $pdf = PDF::loadView('invoice.user_invoice');

        $data["email"] = "chamikap40@gmail.com";
        $data["title"] = "email testing title";
        $data["body"] = "email testing body";

        Mail::send('invoice.user_invoice',$data,function($message) use ($data,$pdf){
            $message->to($data["email"])->subject($data["title"]);
            $message->attachData($pdf->output(),"test.pdf");
            $message->from('chamikap40@yahoo.com');


        });

        $id="new";

        return $pdf->download($id.'.pdf');

        dd("email has been sent");
       
    }


    public function sendInvoice(){

        dd("email has been sent");

    }

}