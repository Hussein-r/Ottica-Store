<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactLenses;
use App\GlassProduct;
use App\GlassProductPrescriptions;
use App\LenseProductPrescriptions;
use App\LenseProduct;
use App\Glass;
use App\lenses_images;
use App\glass_images;
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
        $bestsellerlenses=ContactLenses::where('best_seller',1)->get();
        //get best seller from sales
        $glassarr=array();
        $lensearr=array();
        $glassquery= GlassProduct::select('product_id', DB::raw('count(product_id) as total'))
          ->groupBy('product_id')
          ->orderBy('total', 'DESC')
          ->take(20)
          ->get();
          foreach ($glassquery as $item) {
            array_push($glassarr,$item->product_id);
           }
     $glassProducts =Glass::whereIn('id',$glassarr)->get();
     //lenses
     $lensequery= LenseProduct::select('product_id', DB::raw('count(product_id) as total'))
          ->groupBy('product_id')
          ->orderBy('total', 'DESC')
          ->take(20)
          ->get();

          foreach ($lensequery as $item) {
            array_push($lensearr,$item->product_id);
        }



     $lenseProducts =ContactLenses::whereIn('id',$lensearr)->get();
        return view('bestSeller.list' , [
        'bestsellerglasses' => $bestsellerglasses,
        'bestsellerlenses' => $bestsellerlenses,  
        'lenseProducts' =>$lenseProducts,
        'glassProducts'=>$glassProducts,
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
