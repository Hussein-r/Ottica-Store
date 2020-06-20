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
        $lenses = LenseProduct::crossJoin('glasses','glasses.id','=','order_lenses_products.product_id')
        ->where('order_id',$order->id)
        ->get();
        dd($lenses);


        return view('cart',compact('glasses','brand','color','image'));
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
        //
    }
}
