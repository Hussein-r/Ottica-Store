<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Glass;
use App\Color;
use App\FaceShape;
use App\FrameShape;
use App\Material;
use App\Fit;
use App\GlassImage;

class GlassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $glasses = Glass::all();
         $color = new Color();
        return view('glass.index',compact('glasses','color'));
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
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg',
        // ]);
        $glass= Glass::create($request->all());
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move(public_path('images'),$name);
                GlassImage::insert( [
                    'glass_id' => $glass->id,
                    'image'=> $name,
                ]);
            }
        }
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
        $brand = Brand::pluck('name', 'id');
        $color = Color::pluck('name','id');
        $face = FaceShape::pluck('name','id');
        $frame = FrameShape::pluck('name','id');
        $material = Material::pluck('name','id');
        $fit = Fit::pluck('name','id');
        $type = ['sunglass'=>'Sun glass','eyeglass'=>'Eye glass'];
        $gender = ['male'=>'male','female'=>'female','unisex'=>'unisex'];
        $label = ['best'=>'Best seller','new'=>'New arrival'];

        $glass= Glass::find($id);
        return view('glass.edit', compact('brand','color','face','frame','material','fit','type','gender','label','glass'));

        // return view('glass\edit',['glass'=>$glass])->render();
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
        $glass= Glass::update($request->all());
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move(public_path('images'),$name);
                GlassImage::update( [
                    'glass_id' => $glass->id,
                    'image'=> $name,
                ]);
            }
        }
        return redirect()->action('GlassController@index');

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
