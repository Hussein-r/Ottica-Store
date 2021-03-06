<?php

namespace App\Http\Controllers;
use App\FrameShape;
use App\Glass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrameShapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shapes = FrameShape::all();
        return view('frameShape.index', compact('shapes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frameShape.create')->render();
        
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
        $shape = new FrameShape;
        $shape->name = $request->name;
        $shape->save();
        return redirect()->route('frameShape.index');

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
        $shape = FrameShape::find($id);
        return view('frameShape.edit', compact('shape'));
        
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
        $shape = FrameShape::find($id);
        $shape->name = $request->name;
        $shape->save();
        return redirect()->route('frameShape.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shape = FrameShape::find($id);
        $glass = Glass::where('frame_shape_id',$shape->id);
        if ($glass->exists()){
            $glass->delete();
        }
        $shape->delete();
        return redirect()->route('frameShape.index');
    
    }
}
