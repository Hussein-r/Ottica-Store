<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Glass;
use App\Color;
use App\Charts\AdminChart;
use App\orderList;
class AdminController extends Controller
{
    public function sun(){
        $glasses = Glass::where('glass_type','=','sunglass')->paginate(15);
        $color = new Color();
        return view('glass.index',compact('glasses','color'));

    }
    public function eye(){
        $glasses = Glass::where('glass_type','=','eyeglass')->paginate(15);
        $color = new Color();
        return view('glass.index',compact('glasses','color'));
    
    }
    public function adminHome(){
        // $orders = orderList::whereYear('created_at', date('Y'));
        $glass = Glass::pluck('price_before_discount','id');

        // $chart = new AdminChart();
        // $chart->labels(['1', '2', '3'])
        // ->dataset('glasses','line', $glass->values());
        return view('dashboard');
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
