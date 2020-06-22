<?php

namespace App\Http\Controllers;
use App\orderList;
use App\ContactLenses;
use App\GlassProduct;
use App\GlassProductPrescriptions;
use App\LenseProductPrescriptions;
use App\LenseProduct;
use App\Glass;
use App\lenses_images;
use App\glass_images;
use App\LensePrescriptionImage;
use App\GlassPrescriptionImage;
use Illuminate\Http\Request;

class ListOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         //
         $orders = orderList::List()->get();
        
         return view('ordersForAdmin.listOrders',['orders' => $orders]);
         
    }
    // public function details($id)
    // {
    //     //
    //      //

    //      $glassesDetails = GlassProductPrescriptions::find($id);
        
    //      $lensesDetails= LenseProductPrescriptions::find($id);
    //      dd($lensesDetails);

    //      return view('ordersForAdmin.orderDetails',
    //      ['glassesDetails' => $glassesDetails,
    //      'lensesDetails'=> $lensesDetails,
    //      ]);

    // }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }
    public function processingOrder($id)
    {
        // dd($id);
        $offer = orderList::find($id);
        // dd($offer);
        $offer->admin_order_state ="processing";
        $offer->save();
        return redirect()->action(
            'ListOrdersController@processingOrdersList');
    }
    
    public function doneOrder($id)
    {
        $offer = orderList::find($id);
        $offer->admin_order_state ="out for delivery";
        $offer->save();
        return redirect()->action(
            'ListOrdersController@doneOrdersList');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $glassProducts=GlassProduct::where('order_id','=',$id)->get();

        foreach($glassProducts as $glass){
            if ($glass->prescription_type =='image')
            {
               $glassPrescriptionImages= GlassPrescriptionImage::where('order_id','=',$id)
               ->where('product_id','=',$glass->product_id)
               ->get();
            }
            else{
                $glassPrescription=GlassProductPrescriptions::where('order_id',$id)
                ->where('product_id','=',$glass->product_id)
               ->get();
            }
        }
         $glassarr=array();
        foreach ($glassProducts as $product) {
            array_push($glassarr,$product->product_id);
        }

        $glasses = Glass::find($glassarr);
        // dd($glasses);

        foreach($glasses as $glass){
            $glassImgarr =glass_images::where('glass_id', $glass->id)->first();
        }
        $glassQty=GlassProduct::where('order_id',$id)->get();
        // dd( $glassPrescriptionImages);
        // dd($glassPrescription);
        // dd( $glassProducts);





        //LENSES
        // $lenseProducts=ContactLenses::where('order_id','=',$id)->get();-
        // $glassesDetails = 
        // $lensesDetails= LenseProductPrescriptions::where('order_id',$id)->get();
        // // $lensearr=array();
        // $glassarr=array();
        // $lenseImgarr=array();
        // $glassImgarr=array();
       
        // foreach ($lensesDetails as $product) {
        //     array_push($lensearr,$product->product_id);
        // }
        // $lenses = ContactLenses::find($lensearr);
        // foreach($lenses as $lense){
        //     $lenseImgarr =lenses_images::where('lense_id', $lense->id)->first();
        // }
        // dd($glassImgarr->image);


        //  dd($lensesDetails);
        return view('ordersForAdmin.orderDetails',
        ['glassProducts' => $glassProducts,
        'glassPrescriptionImages'=> $glassPrescriptionImages,
        'glassPrescription' => $glassPrescription ,
        'glasses'=>$glasses,
        'glassImgarr' =>$glassImgarr,
        'glassQty' => $glassQty,
        ]);
    }


    public function inactiveOrdersList()
    {
        //
        $orders = orderList::where('user_order_state','1')
        ->where('admin_order_state','inactive')
        ->get();
  return view('ordersForAdmin.listOrders',['orders' => $orders]);
  
    }

    public function processingOrdersList()
    {
        //
        $orders = orderList::where('user_order_state','1')
        ->where('admin_order_state','processing')
        ->get();
  return view('ordersForAdmin.listOrders',['orders' => $orders]);
    }


    public function doneOrdersList()
    {
        //
               $orders = orderList::where('user_order_state','1')
               ->where('admin_order_state','out for delivery')
               ->get();
         return view('ordersForAdmin.listOrders',['orders' => $orders]);
         
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
    }


}
