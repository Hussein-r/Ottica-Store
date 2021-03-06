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
use App\ContactLenses;
use App\LenseImage;
use App\LenseBrand;
use App\LenseType;
use App\LenseManufacturerer;
use App\ColorLense;

class FilterationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // //price in same table
            // $brands=Brand::all();
            // //gender-> male - female - unisex
            // $faceShapes=FaceShape::all();
            // $frameShapes=FrameShape::all();
            // $colors=Color::all();
            // $secondaryColors=Color::all();
            // $materials=Material::all();
            // $secondaryMaterials=Material::all();
            // $fits=Fit::all();

            //   return view('glass.sunglass',compact('brands','faceShapes',
            //   'frameShapes','colors','secondaryColors','materials',
            //   'secondaryMaterials','fits')) ;   
            
           
         

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

      //eyeglasses filteration
      if (isset($request->brand))
{
  $brandArr=array();
  $brandArr= $request->brand;
}
else{
  $brandArr=array();
  $brands=Brand::all();
 foreach($brands as $brand)
 {
   array_push($brandArr,$brand->id);
 }

}
// dd($brandArr);

if (isset($request->gender))
{
  $genderArr=array();
  $genderArr= $request->gender;
}
else{
  $genderArr=array();
  $genderArr=['male','female','unisex'];
}
// dd($genderArr);

if (isset($request->face_shape))
{
  $face_shapeArr=array();
  $face_shapeArr= $request->face_shape;
}
else{
  $face_shapeArr=array();
  $face_shapes=FaceShape::all();
  foreach($face_shapes as $face_shape)
  {
    array_push($face_shapeArr,$face_shape->id);
  }
 
}
// dd($face_shapeArr);

if (isset($request->frame_shape))
{
  $frame_shapeArr=array();
  $frame_shapeArr= $request->frame_shape;
}
else{
  $frame_shapeArr=array();
  $frame_shapes=FrameShape::all();
  foreach($frame_shapes as $frame_shape)
  {
    array_push($frame_shapeArr,$frame_shape->id);
  }
}
// dd($frame_shapeArr);

if (isset($request->color))
{
  $colorArr=array();
  $colorArr= $request->color;
}
else{
  $colorArr=array();
  $colors=Color::all();
  foreach($colors as $color)
  {
    array_push($colorArr,$color->id);
  }

}
// dd($colorArr);

if (isset($request->secondary_color))
{
  $secondary_colorArr=array();
  $secondary_colorArr= $request->secondary_color;
}
else{
  $secondary_colorArr=array();
  $secondary_colors=Color::all();
  foreach($secondary_colors as $color)
  {
    array_push($secondary_colorArr,$color->id);
  }

}
// dd($secondary_colorArr);

if (isset($request->material))
{
  $materialArr=array();
  $materialArr= $request->material;
}
else{
  $materialArr=array();
  $materials=Material::all();
  foreach($materials as $material)
  {
    array_push($materialArr,$material->id);
  }

}
// dd($materialArr);

if (isset($request->secondary_material))
{
  $secondary_materialArr=array();
  $secondary_materialArr= $request->secondary_material;
}
else{
  $secondary_materialArr=array();
  $secondary_materials=Material::all();
  foreach($secondary_materials as $material)
  {
    array_push($secondary_materialArr,$material->id);
  }

}
// dd($secondary_materialArr);

if (isset($request->fit))
{
  $fitArr=array();
  $fitArr= $request->fit;
}
else{
  $fitArr=array();
  $fits=Fit::all();
  foreach($fits as $fit)
  {
    array_push($fitArr,$fit->id);
  }
}
// dd($fitArr);
if (isset($request->maximum_price)){
  if ($request->maximum_price == 1)
  {
    $price=[0,500];
    // dd($price);
  }
  elseif ($request->maximum_price == 2)
  {
    $price=[500,1000];
    // dd($price);
  }
  elseif ($request->maximum_price == 3)
  {
    $price=[1000,100000];
    // dd($price);
  }

}else{
  $price=[0,100000];
}

$glasses_types=['eyeglass'];
$glasses=Glass::whereIn('glass_type',$glasses_types)
->WhereIn('gender',$genderArr)
->WhereIn('brand_id',$brandArr)
->WhereIn('color_id',$colorArr)
->WhereIn('secondary_color_id',$secondary_colorArr)
->WhereIn('material_id',$materialArr)
->WhereIn('secondary_material_id',$secondary_materialArr)
->WhereIn('face_shape_id',$face_shapeArr)
->WhereIn('frame_shape_id',$frame_shapeArr)
->WhereIn('fit_id',$fitArr)
->whereBetween('price_after_discount',$price)
->get();

 return view('glass.filteredEyeglass',compact('glasses'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
 //sunglass filteration

if (isset($request->brand))
{
  $brandArr=array();
  $brandArr= $request->brand;
}
else{
  $brandArr=array();
  $brands=Brand::all();
 foreach($brands as $brand)
 {
   array_push($brandArr,$brand->id);
 }

}
// dd($brandArr);

if (isset($request->gender))
{
  $genderArr=array();
  $genderArr= $request->gender;
}
else{
  $genderArr=array();
  $genderArr=['male','female','unisex'];
}
// dd($genderArr);

if (isset($request->face_shape))
{
  $face_shapeArr=array();
  $face_shapeArr= $request->face_shape;
}
else{
  $face_shapeArr=array();
  $face_shapes=FaceShape::all();
  foreach($face_shapes as $face_shape)
  {
    array_push($face_shapeArr,$face_shape->id);
  }
 
}
// dd($face_shapeArr);

if (isset($request->frame_shape))
{
  $frame_shapeArr=array();
  $frame_shapeArr= $request->frame_shape;
}
else{
  $frame_shapeArr=array();
  $frame_shapes=FrameShape::all();
  foreach($frame_shapes as $frame_shape)
  {
    array_push($frame_shapeArr,$frame_shape->id);
  }
}
// dd($frame_shapeArr);

if (isset($request->color))
{
  $colorArr=array();
  $colorArr= $request->color;
}
else{
  $colorArr=array();
  $colors=Color::all();
  foreach($colors as $color)
  {
    array_push($colorArr,$color->id);
  }

}
// dd($colorArr);

if (isset($request->secondary_color))
{
  $secondary_colorArr=array();
  $secondary_colorArr= $request->secondary_color;
}
else{
  $secondary_colorArr=array();
  $secondary_colors=Color::all();
  foreach($secondary_colors as $color)
  {
    array_push($secondary_colorArr,$color->id);
  }

}
// dd($secondary_colorArr);

if (isset($request->material))
{
  $materialArr=array();
  $materialArr= $request->material;
}
else{
  $materialArr=array();
  $materials=Material::all();
  foreach($materials as $material)
  {
    array_push($materialArr,$material->id);
  }

}
// dd($materialArr);

if (isset($request->secondary_material))
{
  $secondary_materialArr=array();
  $secondary_materialArr= $request->secondary_material;
}
else{
  $secondary_materialArr=array();
  $secondary_materials=Material::all();
  foreach($secondary_materials as $material)
  {
    array_push($secondary_materialArr,$material->id);
  }

}
// dd($secondary_materialArr);

if (isset($request->fit))
{
  $fitArr=array();
  $fitArr= $request->fit;
}
else{
  $fitArr=array();
  $fits=Fit::all();
  foreach($fits as $fit)
  {
    array_push($fitArr,$fit->id);
  }
}
// dd($fitArr);
if (isset($request->maximum_price)){
  if ($request->maximum_price == 1)
  {
    $price=[0,500];
    // dd($price);
  }
  elseif ($request->maximum_price == 2)
  {
    $price=[500,1000];
    // dd($price);
  }
  elseif ($request->maximum_price == 3)
  {
    $price=[1000,100000];
    // dd($price);
  }

}else{
  $price=[0,100000];
}

$glasses_types=['sunglass'];
$glasses=Glass::whereIn('glass_type',$glasses_types)
->WhereIn('gender',$genderArr)
->WhereIn('brand_id',$brandArr)
->WhereIn('color_id',$colorArr)
->WhereIn('secondary_color_id',$secondary_colorArr)
->WhereIn('material_id',$materialArr)
->WhereIn('secondary_material_id',$secondary_materialArr)
->WhereIn('face_shape_id',$face_shapeArr)
->WhereIn('frame_shape_id',$frame_shapeArr)
->WhereIn('fit_id',$fitArr)
->whereBetween('price_after_discount',$price)
->get();
return view('glass.filteredSunglass',compact('glasses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //lenses_filteration
        // dd($request->type);
            // dd($request);
            if (!is_null($request->brand))
            {
              $brandArr=array();
              $brandArr=$request->brand;
            }else{
              $brandArr=array();
              $lensesBrands=LenseBrand::all();
              foreach($lensesBrands as $brand)
              {
                array_push($brandArr,$brand->id);
              }

            }
            // dd($brandArr);
            // /////
            if (!is_null($request->type))
            {
              $typeArr=array();
              $typeArr=$request->type;
            }else{
              $typeArr=array();
              $lensesTypes=LenseType::all();
              foreach($lensesTypes as $type)
              {
                array_push($typeArr,$type->id);
              }
            }
            // dd($typeArr);
            if (!is_null($request->manufacturer))
            {
              $manufacturerArr=array();
              $manufacturerArr=$request->manufacturer;
            }else{
              $manufacturerArr=array();
              $lenseManufacturer=LenseManufacturerer::all();
              foreach($lenseManufacturer as $manufacturer)
              {
                array_push($manufacturerArr,$manufacturer->id);
              }
            }
            // dd($manufacturerArr);

            if (!is_null($request->purpose))
            {
              $purposeArr=array();
              $purposeArr=$request->purpose;
            }else{
              $purposeArr=array();
              $purposeArr=['medical','beauty'];
            }
                      $lenses=ContactLenses::whereIn('brand_id',$brandArr)
                      ->whereIn('type_id',$typeArr)
                      ->whereIn('manufacturerer_id',$manufacturerArr)
                      ->whereIn('lense_purpose',$purposeArr)
                      ->get();
                      // dd($lenses);
                    
                    return view('ContactLenses.filteredLenses',compact('lenses'));
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
