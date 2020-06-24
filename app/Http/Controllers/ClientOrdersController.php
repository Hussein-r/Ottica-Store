<?php

namespace App\Http\Controllers;
use App\GlassProductPrescriptions;
use App\LenseProductPrescriptions;
use App\GlassPrescriptionImage;
use App\GlassProduct;
use App\LenseProduct;
use App\User;
use App\Glass;
use App\LenseImage;
use App\ContactLenses;
use App\TotalPrice;
use Illuminate\Support\Facades\Auth;
use App\orderList;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;


class ClientOrdersController extends Controller
{

    
    public function __construct() {
      $stripe= Stripe::setApiKey(env('STRIPE_SECRET'));
      
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $orders=orderList::where("user_id","=",Auth::id())->get();
        // dd($orders);
        return view('ordersForClient.index', [
            'orders' =>$orders,
            ])->render();
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $openOrder=orderList::where([["user_id","=",Auth::id()],["user_order_state","=",'0']])->get();

        } catch(\Illuminate\Database\QueryException $ex){ 
            dd($ex->getMessage()); 
        }
        if ($openOrder->isEmpty()) {
            $userdata=User::where("id","=",Auth::id())->firstOrFail();
            $order = new orderList();
            $order->user_id = Auth::id();
            $order->phone = $userdata->phone;
            $order->address = $userdata->address;
            $order->save();
            $glass = new GlassProduct();
            $glass->order_id= $order->id;
            $glass->product_id=$request->product_id;
            $glass->quantity=$request->quantity;
            $glass->category=$request->category;
            if($request->category == 1){
                $glass->price=$request->price * $request->quantity;
            }else if($request->category == 2){
                $lense_details = explode(',', $request->single_lense);
                $glass->lense_type=$request->single_lense_type;
                $glass->color_id=$lense_details[0];
                $glass->price=($request->price + $lense_details[1]) * $request->quantity;
                $glass->prescription_type=$request->prescription_type;
            }else if($request->category == 3){
                $lense_details = explode(',', $request->progressive_lense);
                $glass->lense_type=$request->progressive_lense_type;
                $glass->color_id=$lense_details[0];
                $glass->price=($request->price + $lense_details[1]) * $request->quantity;
                $glass->prescription_type=$request->prescription_type;
            }else if($request->category == 4){
                $lense_details = explode(',', $request->bifocal_lense);
                $glass->lense_type=$request->bifocal_lense_type;
                $glass->color_id=$lense_details[0];
                $glass->price=($request->price + $lense_details[1]) * $request->quantity;
                $glass->prescription_type=$request->prescription_type;
            }
            $glass->save();
            if($request->check=='1'){
                if($request->file('image')){
                    $prescription_image= new GlassPrescriptionImage();
                    $prescription_image->order_id=$order->id;
                    $prescription_image->product_id=$request->product_id;
                    $imageName = time().'.'.$request->image->extension();  
                    $request->image->move(public_path('images'), $imageName);
                    $prescription_image->image = $imageName;
                    $prescription_image->save();
                }else{
                    $prescription_details= new GlassProductPrescriptions();
                    $prescription_details->order_id = $order->id;
                    $prescription_details->product_id =$request->product_id;
                    $prescription_details->right_sphere =$request->right_sphere;
                    $prescription_details->left_sphere =$request->left_sphere;
                    $prescription_details->right_cylinder =$request->right_cylinder;
                    $prescription_details->left_cylinder =$request->left_cylinder;
                    $prescription_details->right_axis =$request->right_axis;
                    $prescription_details->left_axis =$request->left_axis;
                    $prescription_details->right_add =$request->right_add;
                    $prescription_details->left_add =$request->left_add;
                    $prescription_details->save();
                }
            }
        }else{
            $glass = new GlassProduct();
            $glass->order_id= $openOrder[0]->id;
            $glass->product_id=$request->product_id;
            $glass->quantity=$request->quantity;
            $glass->category=$request->category;
            if($request->category == 1){
                $glass->price=$request->price * $request->quantity;
            }else if($request->category == 2){
                $lense_details = explode(',', $request->single_lense);
                $glass->lense_type=$request->single_lense_type;
                $glass->color_id=$lense_details[0];
                $glass->price=($request->price + $lense_details[1]) * $request->quantity;
                $glass->prescription_type=$request->prescription_type;
            }else if($request->category == 3){
                $lense_details = explode(',', $request->progressive_lense);
                $glass->lense_type=$request->progressive_lense_type;
                $glass->color_id=$lense_details[0];
                $glass->price=($request->price + $lense_details[1]) * $request->quantity;
                $glass->prescription_type=$request->prescription_type;
            }else if($request->category == 4){
                $lense_details = explode(',', $request->bifocal_lense);
                $glass->lense_type=$request->bifocal_lense_type;
                $glass->color_id=$lense_details[0];
                $glass->price=($request->price + $lense_details[1]) * $request->quantity;
                $glass->prescription_type=$request->prescription_type;
            }
            $glass->save();
            if($request->check=='1'){
                if($request->file('image')){
                    $prescription_image= new GlassPrescriptionImage();
                    $prescription_image->order_id=$openOrder[0]->id;
                    $prescription_image->product_id=$request->product_id;
                    $imageName = time().'.'.$request->image->extension();  
                    $request->image->move(public_path('images'), $imageName);
                    $prescription_image->image = $imageName;
                    $prescription_image->save();
                }else{
                    $prescription_details= new GlassProductPrescriptions();
                    $prescription_details->order_id = $openOrder[0]->id;
                    $prescription_details->product_id =$request->product_id;
                    $prescription_details->right_sphere =$request->right_sphere;
                    $prescription_details->left_sphere =$request->left_sphere;
                    $prescription_details->right_cylinder =$request->right_cylinder;
                    $prescription_details->left_cylinder =$request->left_cylinder;
                    $prescription_details->right_axis =$request->right_axis;
                    $prescription_details->left_axis =$request->left_axis;
                    $prescription_details->right_add =$request->right_add;
                    $prescription_details->left_add =$request->left_add;
                    $prescription_details->save();
                }
            }
        }

        return redirect()->action('CartController@index');
    }


    public function storeLense(Request $request)
    {
        $type = explode(',', $request->type);
        try {
            $openOrder=orderList::where([["user_id","=",Auth::id()],["user_order_state","=",'0']])->get();

        } catch(\Illuminate\Database\QueryException $ex){ 
            dd($ex->getMessage()); 
        }
        if ($openOrder->isEmpty()) {
            $userdata=User::where("id","=",Auth::id())->firstOrFail();
            $order = new orderList();
            $order->user_id = Auth::id();
            $order->phone = $userdata->phone;
            $order->address = $userdata->address;
            $order->save();
            $lense = new LenseProduct();
            $lense->order_id=$order->id;
            $lense->product_id=$request->product_id;
            $lense->duration=$type[0];
            $lense->price=$type[1];
            $lense->quantity=$request->quantity;
            $lense->color_id=$request->color;
            $lense->category=$request->category;
            if($request->category =="medical"){
                $lense->prescription_type=$request->prescription_type;
            }
            $lense->save();
            if($request->prescription_type =="image"){
                $prescription_image= new LensePrescriptionImage();
                $prescription_image->order_id=$order->id;
                $prescription_image->product_id=$request->product_id;
                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('images'), $imageName);
                $prescription_image->image = $imageName;
                $prescription_image->save();
            }else{
                $prescription_details= new LenseProductPrescriptions();
                $prescription_details->order_id = $order->id;
                $prescription_details->product_id =$request->product_id;
                $prescription_details->right_bc =$request->right_bc;
                $prescription_details->left_bc =$request->left_bc;
                $prescription_details->right_power =$request->right_power;
                $prescription_details->left_power =$request->left_power;
                $prescription_details->right_dia =$request->right_dia;
                $prescription_details->left_dia =$request->left_dia;
                $prescription_details->save();

            }
            

        }else{
            $lense = new LenseProduct();
            $lense->order_id=$openOrder[0]->id;
            $lense->product_id=$request->product_id;
            $lense->duration=$type[0];
            $lense->price=$type[1];
            $lense->quantity=$request->quantity;
            $lense->color_id=$request->color;
            $lense->category=$request->category;
            if($request->category =="medical"){
                $lense->prescription_type=$request->prescription_type;
            }
            $lense->save();
            if($request->prescription_type =="image"){
                $prescription_image= new LensePrescriptionImage();
                $prescription_image->order_id=$openOrder[0]->id;
                $prescription_image->product_id=$request->product_id;
                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('images'), $imageName);
                $prescription_image->image = $imageName;
                $prescription_image->save();
            }else{
                $prescription_details= new LenseProductPrescriptions();
                $prescription_details->order_id = $openOrder[0]->id;
                $prescription_details->product_id =$request->product_id;
                $prescription_details->right_bc =$request->right_bc;
                $prescription_details->left_bc =$request->left_bc;
                $prescription_details->right_power =$request->right_power;
                $prescription_details->left_power =$request->left_power;
                $prescription_details->right_dia =$request->right_dia;
                $prescription_details->left_dia =$request->left_dia;
                $prescription_details->save();

            }
        }

        return redirect()->action('CartController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $glassesArray=array();
        $lensesArray=array();
        
        $price = TotalPrice::where('order_id','=',$id)->get();
        // dd($price);
      
        //    dd($finalprice);
        $glassesProduct=GlassProduct::where('order_id','=',$id)->get();

        $lensesProduct=LenseProduct::where('order_id','=',$id)->get();
        // $lensePrice=$lensesProduct->price;
            foreach ($glassesProduct as $product) {
                array_push($glassesArray,$product->product_id);
                
             }
            //  dd($glassesArray);
            //  dd($glassesProduct);
             foreach ($lensesProduct as $product) {
                array_push($lensesArray,$product->product_id);
                $lensePrice=$product->price;
             }
            //  dd($lensesArray);
            foreach ($price as $item) {
                $finalprice=$item->price_after_promocode+$lensePrice;
              }
        $glasses=Glass::whereIn('id',$glassesArray)->get();
        // dd($glasses);
        $lenses=ContactLenses::whereIn('id',$lensesArray)->get();
        // dd($lenses);
        return view('ordersForClient.show',compact('glasses','lenses','finalprice','lensePrice'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
        $order=orderList::find($id);
        $order->delete();
        return redirect()->action("ClientOrdersController@index");   
  
    }

    //Payment


    public function payment($id)
    {
       
        $orderId=$id;
        return view('payment',compact('orderId'));
    }

    public function subscribe(Request $request,$order_id)
    {
        // dd($stripe);
        // dd($request);
        // dd($request->all());
        $order=orderList::find($order_id);
        // dd($order);
        $id=$order_id;
        // dd($id);
        $price = TotalPrice::where('order_id','=',$id)->get();
        // dd($price);
        foreach ($price as $item) {
           $finalprice=$item->price_after_promocode;
         }
        //  dd($finalprice);

        // dd($price->price_after_promocode);
        try {
            $charge = Stripe::charges()->create([
              
                'amount'=>$finalprice,
                'source' => $request->stripeToken,
                "currency" => "EGP",
            ]);
            
                //  dd($charge);
        
    
            // SUCCESSFUL
            $order->payment_state=1;
            $order->save();
            return redirect('/orderHistory');
        } catch (CardErrorException $e) {
            // save info to database for failed
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }


    
}
