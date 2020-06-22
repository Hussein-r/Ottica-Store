<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactLenses;
use App\GlassProduct;
use App\GlassProductPrescriptions;
use App\LenseProductPrescriptions;
use App\LenseProduct;
use App\Glass;
use App\Color;
use App\glass_images;
use App\ColorLense;
use DB; 

class BestSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get best seller from check box
        $bestsellerglasses=Glass::where('best_seller',1)->get();
        // dd($bestsellerglasses);
        $GlassColor=array();
        foreach ($bestsellerglasses as $item) {
            array_push($GlassColor,$item->color_id);
        }
        $bestSellerGlassColor=Color::whereIn('id',$GlassColor)->get();
        // dd($bestSellerGlassColor);
        $GlassImg=array();
        foreach ($bestsellerglasses as $item) {
            array_push($GlassImg,$item->id);
        }
        $bestSellerGlassImages=glass_images::whereIn('glass_id',$GlassImg)->get();
        // dd($bestSellerGlassImages);
        $bestsellerlenses=ContactLenses::where('best_seller',1)->get();
        $LenseImg =array();
        foreach ($bestsellerlenses as $item) {
            array_push($LenseImg,$item->id);
        }
        // dd($bestSellerLenseImages);   
        $lenseColorBallet=ColorLense::whereIn('lense_id',$LenseImg)->get();
        $lenseColor=array();
        foreach ($lenseColorBallet as $item) {
            array_push($lenseColor,$item->color_id);
        }
        $bestSellerLenseColor=Color::whereIn('id',$lenseColor)->get();
        //   dd($bestSellerLenseColor);
        //get best seller from sales
        //glasses
        $glassarr=array();
        $glassquery= GlassProduct::select('product_id', DB::raw('count(product_id) as total'))
          ->groupBy('product_id')
          ->orderBy('total', 'DESC')
          ->take(20)
          ->get();
          foreach ($glassquery as $item) {
            array_push($glassarr,$item->product_id);
           } 
     $glassProducts =Glass::whereIn('id',$glassarr)->get();
    //  dd($glassProducts);
     $GlassProductColor=array();
     foreach ($glassProducts as $item) {
         array_push($GlassProductColor,$item->color_id);
     }
     $glassProductsColor=Color::whereIn('id',$GlassProductColor)->get();
    //  dd($glassProductsColor);
     $glassProductsImages=glass_images::whereIn('glass_id',$glassarr)->get();
    //  dd($glassProductsImages);
     //lenses
     $lensearr=array();
     $lensequery= LenseProduct::select('product_id', DB::raw('count(product_id) as total'))
          ->groupBy('product_id')
          ->orderBy('total', 'DESC')
          ->take(20)
          ->get();

          foreach ($lensequery as $item) {
            array_push($lensearr,$item->product_id);
        }
     $lenseProducts =ContactLenses::whereIn('id',$lensearr)->get();
    //  dd($lenseProductsImages);
     $lenseProductColorBallet=ColorLense::whereIn('lense_id',$lensearr)->get();
     $LenseProductColor =array();
     foreach ($lenseProductColorBallet as $item) {
        array_push($LenseProductColor,$item->color_id);
    }
     $lenseProductsColor=Color::whereIn('id',$LenseProductColor)->get();
    //  dd($lenseProductsColor);
        return view('bestSeller.bestseller' , [
        'bestsellerglasses' => $bestsellerglasses,
        'bestSellerGlassColor' =>$bestSellerGlassColor,
        'bestSellerGlassImages' =>$bestSellerGlassImages,
        'glassProducts'=>$glassProducts,
        'glassProductsColor' =>$glassProductsColor,
        'glassProductsImages'=>$glassProductsImages,
        'bestsellerlenses' => $bestsellerlenses, 
        'bestSellerLenseColor'=>$bestSellerLenseColor,
        'lenseProducts' =>$lenseProducts,
        'lenseProductsColor'=>$lenseProductsColor, 
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("About&Contact.about");
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
