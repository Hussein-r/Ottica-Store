<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orderList;
use App\Glass;
use App\GlassProduct;
use App\Brand;
use App\Color;
use App\glass_images;
use App\GlassProductPrescriptions;
use App\LenseProduct;
use App\LenseBrand;
use App\LenseType;
use App\ColorLense;
use App\LenseProductPrescriptions;
use App\LensePrescriptionImage;
use App\GlassPrescriptionImage;
use App\Promocode;
use App\TotalPrice;
use App\LenseUseType;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = orderList::where([
            ['user_id',Auth::id()],
            ['user_order_state',0],
            ['admin_order_state','inactive']
        ])->firstOrFail();

        $glasses = GlassProduct::crossJoin('glasses','glasses.id','=','order_glasses_products.product_id')
        ->where('order_id',$order->id)
        ->get();
        $brand = new Brand;
        $color = new Color;
        $image = new glass_images;

        $lenses = LenseProduct::crossJoin('contact_lenses','contact_lenses.id','=','order_lenses_products.product_id')
        ->where('order_id',$order->id)
        ->get();

        $lenses_brand = new LenseBrand;
        $lense_type = new LenseType;
        $lense_color = new ColorLense;
        $use_type = new LenseUseType;

        $discount = 0;
        $total_price = 0;
        foreach ($glasses as $glass){
            $total_price += $glass->price;
            $discount += ($glass->price_before_discount * $glass->quantity) - $glass->price;

        }
        foreach ($lenses as $lense){
            $total_price += $lense->price;
        }
        $order_price = TotalPrice::updateOrCreate(
            ['order_id'=> $order->id],
            ['price'=> $total_price,'price_after_promocode'=> $total_price],
        ) ;

        // dd($lenses);
        // $order_price = new TotalPrice;
        // $order_price->price = $total_price;
        // $order_price->save();

        return view('cart',compact('glasses','brand','color','image','lenses','lenses_brand','lense_type','lense_color','total_price','use_type','discount'));
    }

    public function deleteOrderProduct($id, $quantity,$category, $type)
    {
        $order = orderList::where([
            ['user_id',Auth::id()],
            ['user_order_state',0],
            ['admin_order_state','inactive']
        ])->firstOrFail();

        if ($type == 'glass') {
            $product = GlassProduct::where([
                ['product_id',$id],
                ['order_id',$order->id],
                ['quantity',$quantity],
                ['category',$category]
                ]);
                
            $details = GlassProductPrescriptions::where([
                ['product_id',$id],
                ['order_id',$order->id],
            ]);
            $lense_image = GlassPrescriptionImage::where([
                ['product_id',$id],
                ['order_id',$order->id],
            ]);
            if($details->exists()){
                $details->delete();
            }
            if($lense_image->exists()){
                $lense_image->delete();
            }

            $product->delete();

        } 
        else {
            $product = LenseProduct::where([
                ['product_id',$id],
                ['order_id',$order->id],
                ]);
            
            $details = LenseProductPrescriptions::where([
                ['product_id',$id],
                ['order_id',$order->id],
            ]);
            $lense_image = LensePrescriptionImage::where([
                ['product_id',$id],
                ['order_id',$order->id],
            ]);

            if($details->exists()){
                $details->delete();
            }
            if($lense_image->exists()){
                $lense_image->delete();
            }

            $product->delete();
        }
        // dd($details);
        return redirect()->route('cart.index')->with('success','A product has been removed..');
    }


    public function promocode(Request $request ){
        $promocode = Promocode::where('code','=',$request->coupon)->firstOrFail();
        $discount = ($promocode->discount);
        $order = orderList::where([
            ['user_id',Auth::id()],
            ['user_order_state',0],
            ['admin_order_state','inactive']
        ])->firstOrFail();

        $total = TotalPrice::where('order_id', $order->id)->firstOrFail();
        $discount = $total->price *($promocode->discount / 100);
        $total->price_after_promocode = $total->price - $discount;
            $total->save();

        return response()->json(['total'=>$total->price_after_promocode, 'discount'=> $discount]);

    }

    public function checkout(){

        return view('Users.checkout')->render();
    }

    public function submitOrder(){
        $order = orderList::where([
            ['user_id',Auth::id()],
            ['user_order_state',0],
            ['admin_order_state','inactive']
        ])->update(['user_order_state' => 1],
        );
        return view('thanks')->render();
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
    }
}
