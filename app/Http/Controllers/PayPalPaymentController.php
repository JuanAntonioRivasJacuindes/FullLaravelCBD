<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalPaymentController extends Controller
{
    public function handlePayment()
    {
        $provider = new PayPalClient;
        
        $data = json_decode('{
            "intent": "CAPTURE",
            "purchase_units": [
              {
                "amount": {
                  "currency_code": "USD",
                  "value": "100.00"
                }
              }
            ]
        }', true);
        
        $order = $provider->createOrder($data);
        // dump( env('PAYPAL_SANDBOX_CLIENT_ID'));
        dd($order);
        return redirect("/");
    }
   
    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }
  
    public function paymentSuccess(Request $request)
    {
        // $paypalModule = new ExpressCheckout;
        // $response = $paypalModule->getExpressCheckoutDetails($request->token);
  
        // if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
        //     dd('Payment was successfull. The payment success page goes here!');
        // }
  
        dd('ocurrido');
    }
}