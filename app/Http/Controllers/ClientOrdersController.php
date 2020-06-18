<?php

namespace App\Http\Controllers;
use App\GlassProductPrescriptions;
use App\LenseProductPrescriptions;
use App\GlassProduct;
use App\LenseProduct;
use App\User;
use App\Glass;
use App\LenseImage;
use App\ContactLenses;
use Illuminate\Support\Facades\Auth;
use App\orderList;
use Illuminate\Http\Request;

class ClientOrdersController extends Controller
{
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
                $glass->lense_type=$request->single_lense_type;
                $glass->color_id=$request->single_lense_color;
                $glass->price=($request->price + $request->lense_color) * $request->quantity;
            }else if($request->category == 3){
                $glass->lense_type=$request->progressive_lense_type;
                $glass->color_id=$request->progressive_lense_color;
                $glass->price=($request->price + $request->lense_color) * $request->quantity;
            }else if($request->category == 4){
                $glass->lense_type=$request->bifocal_lense_type;
                $glass->color_id=$request->bifocal_lense_color;
                $glass->price=($request->price + $request->lense_color) * $request->quantity;
            }
            $glass->save();
            if($request->check=='1'){
                if(Request::exists('image')){
                    $prescription_image= new GlassPrescriptionImage();
                    $prescription_image->order_id=$order->id;
                    $prescription_image->product_id=$request->product_id;
                    $imageName = time().'.'.$request->image->extension();  
                    $request->image->move(public_path('images'), $imageName);
                    $prescription_image->image = $imageName;
                    $prescription_image->save();
                }else{
                    $prescription_details= GlassProductPrescriptions::create($request->all());
                    $prescription_details->order_id = $order->id;
                    $prescription_details->product_id =$request->product_id;
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
                $glass->lense_type=$request->single_lense_type;
                $glass->color_id=$request->single_lense_color;
                $glass->price=($request->price + $request->lense_color) * $request->quantity;
            }else if($request->category == 3){
                $glass->lense_type=$request->progressive_lense_type;
                $glass->color_id=$request->progressive_lense_color;
                $glass->price=($request->price + $request->lense_color) * $request->quantity;
            }else if($request->category == 4){
                $glass->lense_type=$request->bifocal_lense_type;
                $glass->color_id=$request->bifocal_lense_color;
                $glass->price=($request->price + $request->lense_color) * $request->quantity;
            }
            $glass->save();
            if($request->check=='1'){
                if(Request::exists('image')){
                    $prescription_image= new GlassPrescriptionImage();
                    $prescription_image->order_id=$openOrder[0]->id;
                    $prescription_image->product_id=$request->product_id;
                    $imageName = time().'.'.$request->image->extension();  
                    $request->image->move(public_path('images'), $imageName);
                    $prescription_image->image = $imageName;
                    $prescription_image->save();
                }else{
                    $prescription_details= GlassProductPrescriptions::create($request->all());
                    $prescription_details->order_id = $openOrder[0]->id;
                    $prescription_details->product_id =$request->product_id;
                    $prescription_details->save();
                }
            }
        }
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
        
        $glassesProduct=GlassProduct::where('order_id','=',$id)->get();
        $lensesProduct=LenseProduct::where('order_id','=',$id)->get();
            foreach ($glassesProduct as $product) {
                array_push($glassesArray,$product->product_id);
             }
             foreach ($lensesProduct as $product) {
                array_push($lensesArray,$product->product_id);
             }
            //  dd($lensesArray);
        $glasses=Glass::whereIn('id',$glassesArray)->get();
        // dd($glasses);
        $lenses=ContactLenses::whereIn('id',$lensesArray)->get();
        // dd($lenses);
        return view('ordersForClient.show',compact('glasses','lenses'));

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
}
