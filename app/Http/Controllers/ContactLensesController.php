<?php

namespace App\Http\Controllers;
use App\ContactLenses;
use App\LenseBrand;
use App\LenseType;
use App\LenseManufacturerer;
use App\Color;
use App\Comment;
use App\LenseUseType;
use App\ColoredEye;
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
        $colors = new Color();
        $manufacturerers=LenseManufacturerer::all();
        return view('ContactLenses/index', [
        'lenses'=>$lenses,
        'brands' => $brands,
        'types' => $types,
        'manufacturerers' => $manufacturerers,
        'colors'=>$colors,
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
        $colors = Color::all();
        $manufacturerers=LenseManufacturerer::all();
        return view('ContactLenses.create',[
            'brands' => $brands,
            'types' => $types,
            'manufacturerers' => $manufacturerers,
            'colors' =>$colors,
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
        $lense= ContactLenses::create($request->except(['image','duration','price']));
        if($files=$request->file('image')){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $lense->image=$imageName;
        }
            $lense->save();
            $color=$request->color;
            // dd($color);
            foreach($color as $subColor)
          {
            //     dd($subColor);
            $colorlense=new ColorLense();
            $colorlense->color_id=$subColor;
            $colorlense->lense_id=$lense->id;
            $colorlense->save();
            }
            
            // $lense->quantity=$request->quantity;
            for($i = 0;$i<($request->number_of_types);$i++)
            {
                $lenseusetype=new LenseUseType();
                $lenseusetype->lense_id=$lense->id;
                $lenseusetype->duration=$request->duration[$i];
                $lenseusetype->price=$request->price[$i];
                $lenseusetype->save();
            }
            
       
        
        return redirect()->action('ContactLensesController@index');
           }

       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lense=ContactLenses::where("id","=",$id)->firstOrFail();
        $brand=LenseBrand::where("id","=",$lense->brand_id)->firstOrFail();
        $color=ColorLense::where("lense_id","=",$lense->id)->get('color_id');
        $colors=Color::whereIn("id",$color)->get();
        $types=LenseUseType::where("lense_id","=",$id)->get();
        $comments=Comment::where([["category","=",'lense'],["product_id","=",$id]])->get();
        return view('ContactLenses/lenseProfile',compact('lense','brand','colors','comments','types'));

    }



    public function list()
    {
         $lenses = ContactLenses::all();
         $brands=LenseBrand::all();
        $types=LenseType::all();
         $manufacturers=LenseManufacturerer::all();
         return view('ContactLenses.allLenses',
         ['lenses'=>$lenses,
         'brands' => $brands,
         'types'=>$types,
         'manufacturers'=>$manufacturers,
         ])->render();
    }

    public function search(Request $request)
    {
        $brands=LenseBrand::all();
        $types=LenseType::all();
        $manufacturerers=LenseManufacturerer::all();
        $search=$request->get('search');
        
        $lenses=ContactLenses::where("name","like","%". $search ."%")
         ->orWhere("label","like","%". $search ."%")->get();
      
         return view(
             'ContactLenses.allLenses',[
             'lenses'=>$lenses,
             'brands' => $brands,
             'types' => $types,
             'manufacturerers' => $manufacturerers,
            
             ]);
        
    }

//// Sorttt


    public function sort($value)
    {
        $sort = ContactLenses::all();
        $brands=LenseBrand::all();
        $types=LenseType::all();
        $manufacturerers=LenseManufacturerer::all();
      
            if($value==1)
            {
                $lenses=$sort->sortByDesc('created_at');
                
            }
            else if($value==2)
            {
                $lenses=$sort->sortBy('price_after_discount');
            }
            else if($value==3)
            {
                $lenses=$sort->sortByDesc('price_after_discount');
            }
            else if ($value==4)
            {
                $lenses=$sort->sortBy('name');
            }

      
        return view(
            'ContactLenses.allLenses',[
            'lenses'=>$lenses,
            'brands' => $brands,
            'types' => $types,
            'manufacturerers' => $manufacturerers,
           
            ]);
    }
    

    public function destroy($id)
    {
           $lense = ContactLenses::find($id);
           $colors = ColorLense::where('lesne_id','=',$id);
            foreach($colors as $color){
                $color->delete();
            }
            $types=LenseUseType::where('lense_id','=',$id);
            foreach($types as $type){
                $type->delete();
            }

        $lense->delete();
  
    
    
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
        
        
        ContactLenses::whereId($id)->update($request->except(['_method','_token','image','duration','price','color','number_of_types']));
        $lense=ContactLenses::where("id","=",$id)->firstOrFail();
        if($files=$request->file('image')){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $lense->image=$imageName;
        }
        $lense->save();
    
       
       $color=$request->color;
       ColorLense::where('lense_id','=',$id)->delete();
        foreach($color as $subColor)
      {
        $colorlense=new ColorLense ();
        $colorlense->color_id=$subColor;
        $colorlense->lense_id=$id;
        $colorlense->save();
        }
        $lenseTypes=LenseUseType::where("lense_id","=",$id)->delete();
        for($i = 0;$i<($request->number_of_types);$i++)
        {
            $lenseusetype=new LenseUseType();
            $lenseusetype->lense_id=$lense->id;
            $lenseusetype->duration=$request->duration[$i];
            $lenseusetype->price=$request->price[$i];
            $lenseusetype->save();
        }
        
       
        return redirect()->action(
            'ContactLensesController@index'
        );

        return redirect()->action('ContactLensesController@index');
    }
    public function edit($id)
    {
        $lense = ContactLenses::find($id);
        $brands=LenseBrand::all();
        $types=LenseType::all();
        $manufacturerers=LenseManufacturerer::all();
        $colors=Color::all();
        return view('ContactLenses/edit', [
        'lense' =>$lense,
        'brands' => $brands,
        'types' => $types,
        'manufacturerers' => $manufacturerers,
        'colors'=>$colors])->render();
    }

    public function changeColor(Request $request){
        $eye=ColoredEye::where("color_id","=",$request->lensecolor)->firstOrFail();
        $image=$eye->image;
        return ($image);
    }
    

}
