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
use App\ContactLenses;
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
        ]);
// dd($order->count());
        if($order->exists()){
            $order = $order->first();      
        $glasses = Glass::Join('order_glasses_products','order_glasses_products.product_id','=','glasses.id')
        ->where([
            ['order_glasses_products.order_id',$order->id],
            ['order_glasses_products.deleted_at',NULL]
            ])
        ->get();
        $brand = new Brand;
        $color = new Color;
        $image = new glass_images;     

        $lenses = ContactLenses::crossJoin('order_lenses_products','order_lenses_products.product_id','=','contact_lenses.id')
        ->where([
            ['order_lenses_products.order_id',$order->id],
            ['order_lenses_products.deleted_at',NULL]
            ])
        ->get();
        // dd($lenses);

        $lenses_brand = new LenseBrand;
        $lense_type = new LenseType;
        $lense_color = new ColorLense;
        $use_type = new LenseUseType;

//--------Total price calculation ---------//
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
        return view('cart',compact('order','glasses','brand','color','image','lenses','lenses_brand','lense_type','lense_color','total_price','use_type','discount'));
        }
        else {
            return view('cart',compact('order'));
        }
    }

    public function deleteOrderProduct(Request $request)
    {
        $id = $request->input('id');
        $type = $request->input('type');
        $order = orderList::where([
            ['user_id',Auth::id()],
            ['user_order_state',0],
            ['admin_order_state','inactive']
        ])->first();
        $items = 0;
        $items_glass = GlassProduct::where('order_id',$order->id)->count();
        $items_lenses = LenseProduct::where('order_id',$order->id)->count();
        $items = $items_glass + $items_lenses;

        // dd($type);
        if ($type == 'glass') {
            // dd($type);
            $product = GlassProduct::find($id);
            $details = GlassProductPrescriptions::where([
                ['product_id',$product->product_id],
                ['order_id',$order->id],
            ]);
            $lense_image = GlassPrescriptionImage::where([
                ['product_id',$product->product_id],
                ['order_id',$order->id],
            ]);
            if($details->exists()){
                $details->delete();
            }
            if($lense_image->exists()){
                $lense_image->delete();
            }

            // dd($items);
            if($items == 1){
            $product->delete();
            $price = TotalPrice::where('order_id',$order->id);
            $price->delete();  
            $order->delete();
            }
            else {
                // dd('.....');
                $product->delete();

            }      
        
        } 
        elseif ($type == 'lenses') {
            $product = LenseProduct::find($id);
            
            $details = LenseProductPrescriptions::where([
                ['product_id',$product->product_id],
                ['order_id',$order->id],
            ]);
            $lense_image = LensePrescriptionImage::where([
                ['product_id',$product->product_id],
                ['order_id',$order->id],
            ]);

            if($details->exists()){
                $details->delete();
            }
            if($lense_image->exists()){
                $lense_image->delete();
            }
            // dd($items);
            if($items == 1){
                $product->delete();
                $price = TotalPrice::where('order_id',$order->id);
                $price->delete();  
                $order->delete();
            }
            else {
                $product->delete();

            } 

        }
        // dd($details);
        return redirect()->route('cart.index')->with('success','A product has been removed..');
    }


    public function promocode(Request $request){
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

    public function submitOrder(Request $request){
        // dd($request);
        $order = orderList::where([
            ['user_id',Auth::id()],
            ['user_order_state',0],
            ['admin_order_state','inactive']
        ])->update([
            'user_order_state' => 1,
            'first_name'=>$request->c_fname,
            'last_name'=>$request->c_lname,
            'address'=> $request->c_address,
            'phone'=> $request->c_phone
        ]);

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
