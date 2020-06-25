<?php

namespace App\Http\Controllers;
use App\Fit;
use App\Glass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shapes = Fit::all();
        return view('Fit.index', compact('shapes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Fit.create')->render();
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $shape = new Fit;
        $shape->name = $request->name;
        $shape->save();
        return redirect()->route('fit.index');

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
        $shape = Fit::find($id);
        return view('fit.edit', compact('shape'));
        
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
        $request->validate([
            'name' => 'required',
        ]);
        $shape = Fit::find($id);
        $shape->name = $request->name;
        $shape->save();
        return redirect()->route('fit.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shape = Fit::find($id);
        $glass = Glass::where('fit_id',$shape->id);
        if ($glass->exists()){
            $glass->delete();
        }
        $shape->delete();
        return redirect()->route('fit.index');
    
    }
}
