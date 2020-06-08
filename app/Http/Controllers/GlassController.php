<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Glasses;
use App\Color;
use App\FaceShape;
use App\FrameShape;
use App\Material;
use App\Fit;

class GlassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        return view('glass\index')->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::pluck('name', 'id');
        $color = Color::pluck('name','id');
        $face = FaceShape::pluck('name','id');
        $frame = FrameShape::pluck('name','id');
        $material = Material::pluck('name','id');
        $fit = Fit::pluck('name','id');
        $type = ['sunglass'=>'Sun glass','eyeglass'=>'Eye glass'];
        $gender = ['male'=>'male','female'=>'female','unisex'=>'unisex'];
        $label = ['best'=>'Best seller','new'=>'New arrival'];

        
        return view('glass.create', compact('brand','color','face','frame','material','fit','type','gender','label'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Glasses::create($request->all());
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;
            }
        }
        // $glass = new Glasses();
        // $glass->brand_id = $request->brand_id;
        // $glass->save();
        return redirect()->action('GlassController@index');

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
