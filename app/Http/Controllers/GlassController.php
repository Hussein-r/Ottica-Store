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
use App\Comment;
use App\GlassImage;
use App\Favourite;
use App\SingleVision;
use App\ProgressiveVision;
use App\Bifocal;
use Illuminate\Support\Facades\Auth;

class GlassController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminaccess')->except(['sunglasses','eyeglasses','show','favourite','sort','changeColor']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $glasses = Glass::paginate(15);
         $color = new Color;
         $faceShape =new FaceShape;
         $frameShape =new FrameShape;
         $material =new Material;
         $fit =new Fit;
        return view('glass.index',compact('glasses','color','faceShape','frameShape','material','fit'));
    
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
        // $label = ['Best seller'=>'Best seller','new'=>'New arrival'];

        
        return view('glass.create', compact('brand','color','face','frame','material','fit','type','gender'));
    
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
        $glass=Glass::where("id","=",$id)->firstOrFail();
        $brand=Brand::where("id","=",$glass->brand_id)->firstOrFail();
        $images=GlassImage::where("glass_id","=",$id)->get();
        $allcolors=Glass::where("glass_code","=",$glass->glass_code)->get('color_id');
        $colorsnames=Color::whereIn("id",$allcolors)->get();
        $comments=Comment::where([["category","=",'glass'],["product_id","=",$id]])->get();
        $singlelenses= SingleVision::all()->groupBy('lense_type');
        $progressivelenses= ProgressiveVision::all()->groupBy('lense_type');
        $bifocallenses= Bifocal::all()->groupBy('lense_type');
        return view('glass.glass_details',compact('glass','images','brand','colorsnames','comments','singlelenses','progressivelenses','bifocallenses'));
    }

    public function changeColor(Request $request){
        $glass=Glass::where([["glass_code","=",$request->code],["color_id","=",$request->color]])->firstOrFail();
        $id=$glass->id;
        return ($id);

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
        // $type = ['sunglass'=>'Sun glass','eyeglass'=>'Eye glass'];
        $gender = ['male'=>'male','female'=>'female','unisex'=>'unisex'];
        // $label = ['best'=>'Best seller','new'=>'New arrival'];

        $glass= Glass::find($id);
        return view('glass.edit', compact('brand','color','face','frame','material','fit','gender','glass'));

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
        $glass= Glass::whereId($id)->update($request->except(['_method','_token','images']));
        $images=array();
        if($files=$request->file('images')){
            GlassImage::where('glass_id','=',$id)->delete();
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move(public_path('images'),$name);
                GlassImage::insert( [
                    'glass_id' => $id,
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
        $glass = Glass::find($id);
        // dd($id);
        foreach($glass->images as $image){
            $image->delete();
        }
        $glass->delete();
        return redirect()->action(
            'GlassController@index'
        );
    }

    public function sunglasses()
    {
        //filteration part (hajar)
         //price in same table
         $brands=Brand::all();
         //gender-> male - female - unisex
         $faceShapes=FaceShape::all();
         $frameShapes=FrameShape::all();
         $colors=Color::all();
         $secondaryColors=Color::all();
         $materials=Material::all();
         $secondaryMaterials=Material::all();
         $fits=Fit::all();
        /////////////////

        $glasses = Glass::where('glass_type','=','sunglass')->paginate(9);
        // $allcolors=Glass::where("glass_code","=",$glass->glass_code)->get('color_id');
        // $colors=Color::whereIn("id",$allcolors)->get('name');
        return view('glass.sunglass',[
            'glasses'=>$glasses,
            'brands'=>$brands,
            'faceShapes'=>$faceShapes,
            'frameShapes'=>$frameShapes,
            'colors'=>$colors,
            'secondaryColors'=>$secondaryColors,
            'materials'=>$materials,
            'secondaryMaterials'=>$secondaryMaterials,
            'fits'=>$fits,
        ])->render();
    }

    public function eyeglasses()
    {

        //filteration part (hajar)
         //price in same table
         $brands=Brand::all();
         //gender-> male - female - unisex
         $faceShapes=FaceShape::all();
         $frameShapes=FrameShape::all();
         $colors=Color::all();
         $secondaryColors=Color::all();
         $materials=Material::all();
         $secondaryMaterials=Material::all();
         $fits=Fit::all();
        /////////////////
        $glasses = Glass::where('glass_type','=','eyeglass')->paginate(9);
        // $allcolors=Glass::where("glass_code",$glass->glass_code)->get('color_id');
        // $colors=Color::whereIn("id",$allcolors)->get('name');
        return view('glass.eyeglass',[
            'glasses'=>$glasses,
            'brands'=>$brands,
            'faceShapes'=>$faceShapes,
            'frameShapes'=>$frameShapes,
            'colors'=>$colors,
            'secondaryColors'=>$secondaryColors,
            'materials'=>$materials,
            'secondaryMaterials'=>$secondaryMaterials,
            'fits'=>$fits,
        ]);
    }

    public function sort(Request $request)
    {
        if($request->glassType == 'sun'){
            if($request->option == 'low'){
                $glasses = Glass::where('glass_type','=','sunglass')->orderBy('price_after_discount', 'asc')->get();            
            }
            else{
                $glasses = Glass::where('glass_type','=','sunglass')->orderBy('price_after_discount', 'desc')->get();
            }
        }
        elseif($request->glassType == 'eye')
        {
            if($request->option == 'low'){
                $glasses = Glass::where('glass_type','=','eyeglass')->orderBy('price_after_discount', 'asc')->get();

                // $glasses=Glass::where('glass_type','=','eyeglass')->get()->sortBy('price_after_discount')->toArray();
            }
            else{
                $glasses = Glass::where('glass_type','=','eyeglass')->orderBy('price_after_discount', 'desc')->get();

                // $glasses=Glasss::where('glass_type','=','eyeglass')->get()->sortByDesc('price_after_discount')->toArray();
            }
        }
        return view('glass.filteredSunglass', compact('glasses'));

    }

    public function favourite(Request $request)
    {
    
		$fav = Favourite::where(['user_id'=>Auth::id(),'glass_id'=>$request->glass]);
		if($fav->exists()){
			$fav->delete();
		   return response()->json(["like"=>"no"]);
		}
		else
		{    
			$fav=new Favourite();
			$fav->user_id=Auth::id();
			$fav->glass_id=$request->glass;
			$fav->save();
			return response()->json(["like"=>"yes"]);
		}
	}
}
