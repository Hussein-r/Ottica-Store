<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GlassProduct;
use App\LenseProduct;
use App\OrderList;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    //
    protected $provider;
   
    public function __Construct()
    {
        $this->provider = new ExpressCheckout; 
        // dd($this->provider);
    }
    public function getExpressCheckout(){
        $cart=$this->getCheckoutData();
        // dd($cart);
        try{
            $response=$this->provider->setExpressCheckout($cart);
            // dd($response);
            return redirect($response['paypal_link']);
        }
        catch(\Exception $e){
            dd("error");
        }
       
       

    }

    protected function getCheckoutData()
    {

        // $orders=orderList::where("user_id","=",Auth::id())->get();
        // // dd($orders);
        // $glassesArray=array();
        // $lensesArray=array();
        // $glassesProduct=GlassProduct::where('order_id','=',$orders->id)->get();
        // dd($orders->id);
        // dd($glassesProduct);
        // $lensesProduct=LenseProduct::where('order_id','=',$orders->id)->get();
        // // dd($lensesProduct);
        $data = [];
        $items=array_map(function($item){
            return[
                'name'=>$item['product_id'],
                'price'=>$item['price'],
                'quantity'=>$item['quantity'],
                
            ];

        },GlassProduct::get()->toarray());

        $data['items']=$items;
        $data['invoice_id'] = uniqid();
        $data['invoice_description'] = 'haidy';
        $data['return_url'] = route('paypal.success');
        $data['cancel_url'] = route('paypal.cancel');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price'];
        }
        
        $data['total'] = $total;
        // dd($data);
        return $data;
    }

    public function getExpressCheckoutCancel(){
        return back()->with('error','cancel');
    }

    public function getExpressCheckoutSuccess(Request $request){
        $token=$request->get('token');
        // dd($token);
        $PayerID=$request->get('PayerID');
        // dd($PayerID);
        $cart=$this->getCheckoutData();
        // dd($cart);

        $response=$this->provider->getExpressCheckoutDetails($token);
        // dd($response);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $payment_status = $this->provider->doExpressCheckoutPayment($cart, $token, $PayerID);
            // dd($payment_status);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

        }
        return redirect('/cart');

    }
}
