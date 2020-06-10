<?php

namespace App\Http\Controllers;
use App\ContactLenses;
use App\LenseImage;
use App\LenseBrand;
use App\LenseType;
use App\LenseManufacturerer;
use App\Color;
use App\ColorLense;
use Illuminate\Http\Request;

class ContactLensesController extends Controller
{
    // 

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $lenses = ContactLenses::all();
        $brands=LenseBrand::all();
        $types=LenseType::all();
        $color = new Color();
        $manufacturerers=LenseManufacturerer::all();
        return view('ContactLenses/index', [
        'lenses'=>$lenses,
        'brands' => $brands,
        'types' => $types,
        'manufacturerers' => $manufacturerers,
        'color'=>$color,
        ])->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=LenseBrand::all();
        $types=LenseType::all();
        $color = Color::pluck('name','id');
        $manufacturerers=LenseManufacturerer::all();
        return view('ContactLenses.create',[
            'brands' => $brands,
            'types' => $types,
            'manufacturerers' => $manufacturerers,
            'color' =>$color,
            ]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $lense= ContactLenses::create($request->all());
        $color= Color::create($request->all());
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move(public_path('images'),$name);
                LenseImage::insert( [
                    'lense_id' => $lense->id,
                    'image'=> $name,
                ]);
            }
        }
        ColorLense::insert(
            [
                'lense_id' => $lense->id,
                'color_id'=> $color->id,
            ]);
        return redirect()->action('ContactLensesController@index');
        // $images=array();
        // $data=$this->validate($request,[
        //     'name' => 'required|unique:contact_lenses',
        //     'quantity'=>'required|numeric',
        //     'brand_id'=>'required|numeric',
        //     'type_id'=>'required|numeric',
        //     'manufacturerer_id'=>'required|numeric',
        // ]);

        // $lense= new ContactLenses();
        // $lense->name=$request->name;
        // $lense->quantity=$request->quantity;
        // $lense->label=$request->label;
        // $lense->price_before_discount=$request->price_before_discount;
        // $lense->price_after_discount=$request->price_after_discount;
        // $lense->description=$request->description;
        // $lense->brand_id=$request->brand_id;
        // $lense->type_id=$request->type_id;
        // $lense->manufacturerer_id=$request->manufacturerer_id;
        // $lense->material_of_content=$request->material_of_content;
        // $lense->water_of_content=$request->water_of_content;
        // $lense->lense_purpose=$request->lense_purpose;
        // if($files=$request->file('images')){
        //     foreach($files as $file){
        //         $name=$file->getClientOriginalName();
        //         $file->move(public_path('images'),$name);
        //         LenseImage::insert( [
        //             'lense_id' => $request->id,
        //             'image'=> $name,
        //         ]);
        //     }
        // }
        // $lense->save();
        // return redirect()->action(
        //     'ContactLensesController@index'
        // );
    }

   

    public function show()
    {
         $lenses = ContactLenses::all();
         $brands=LenseBrand::all();
         return view('ContactLenses.index',['lenses'=>$lenses, 'brands' => $brands,])->render();
    }



    

    public function destroy($id)
    {
   
        $lense = ContactLenses::find($id);
        foreach($lense->images as $image){
            $image->delete();
        }
        if ($lense != null) {
        $lense->delete();
    }
    
        return redirect()->action("ContactLensesController@index");   
    }

    public function details(ContactLenses $lense)
    {
        $brand=LenseBrand::where("id","=",$lense->brand_id)->get();
        $type=LenseType::where("id","=",$lense->type_id)->get();
        $manufacturerer=LenseManufacturerer::where("id","=",$lense->manufacturerer_id)->get();
        return view('ContactLenses.details',[
        'lense'=>$lense,
        'brand'=>$brand,
        'type'=>$type,
        'manufacturerer'=>$manufacturerer
        ]);
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
        
        
        $lense= ContactLenses::whereId($id)->update($request->except(['_method','_token']));
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move(public_path('images'),$name);
                LenseImage::whereId($id)->update( [
                    'lense_id' => $lense->id,
                    'image'=> $name,
                ]);
            }
        }
        return redirect()->action('ContactLensesController@index');
    }
    public function edit($id)
    {
        $lense = ContactLenses::find($id);
       
        $brands=LenseBrand::all();
        $types=LenseType::all();
        $manufacturerers=LenseManufacturerer::all();
        return view('ContactLenses/edit', [
        'lense' =>$lense,
        'brands' => $brands,
        'types' => $types,
        'manufacturerers' => $manufacturerers])->render();
    }

}
