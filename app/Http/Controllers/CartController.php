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
        // dd($glasses);


        return view('cart',compact('glasses','brand','color','image','lenses','lenses_brand','lense_type','lense_color'));
    }

    public function deleteOrderProduct($id, $quantity,$category, $type)
    {
        $order = orderList::where([
            ['user_order_state',0],
            ['admin_order_state','inactive']
        ])->firstOrFail();

        if ($type == 'glass') {
            $product = GlassProduct::where([
                ['product_id',$id],
                ['order_id',$order->id],
                ['quantity',$quantity],
                ['category',$category]
                ])->get();
            $details = GlassProductPrescriptions::where([
                ['product_id',$id],
                ['order_id',$order->id],
            ])->exists();
        } 
        else {
            $product = LenseProduct::where([
                ['product_id',$id],
                ['order_id',$order->id],
                ])->get();
        }
        dd($details);
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
        $order = orderList::where([
            ['user_order_state',0],
            ['admin_order_state','inactive']
        ])->firstOrFail();

        $product = GlassProduct::where('product_id',$id)->get();

        dd($id);
    }
}
