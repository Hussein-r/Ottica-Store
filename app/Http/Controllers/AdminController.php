<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Glass;
use App\Color;
use App\Charts\OrderChart;
use App\orderList;
use App\TotalPrice;
use App\FaceShape;
use App\FrameShape;
use App\Material;
use App\Fit;
class AdminController extends Controller
{
    public function sun(){
        $glasses = Glass::where('glass_type','=','sunglass')->paginate(15);
        $color = new Color();
        $faceShape =new FaceShape;
        $frameShape =new FrameShape;
        $material =new Material;
        $fit =new Fit;
       return view('glass.index',compact('glasses','color','faceShape','frameShape','material','fit'));
    }


    public function eye(){
        $glasses = Glass::where('glass_type','=','eyeglass')->paginate(15);
        $color = new Color();
        $faceShape =new FaceShape;
        $frameShape =new FrameShape;
        $material =new Material;
        $fit =new Fit;
       return view('glass.index',compact('glasses','color','faceShape','frameShape','material','fit'));
   
    }
    public function adminHome(){
        // $orders = orderList::whereYear('created_at', date('Y'));
        // $glass = Glass::pluck('price_before_discount','id');
        $order = TotalPrice::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Day(created_at)"))
                    ->pluck('count');

       $chart = new OrderChart();
       $chart->labels(['Mon', 'Tue', 'Wed', 'Thu','Fri','Sat', 'Sun'])

    //    $chart->labels(['First', 'Second', 'Third'])
        ->dataset('Order Price','line', $order); 

        return view('dashboard',compact('chart'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
