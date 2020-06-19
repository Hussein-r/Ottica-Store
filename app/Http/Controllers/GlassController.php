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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $glasses = Glass::paginate(15);
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
        // $glasses=Glass::where('glass_type','=','sunglass')->get()->sortBy('price_after_discount');

        $glasses = Glass::where('glass_type','=','sunglass')->paginate(15);
        // $allcolors=Glass::where("glass_code","=",$glass->glass_code)->get('color_id');
        // $colors=Color::whereIn("id",$allcolors)->get('name');
        // dd($glasses);
        return view('glass.sunglass',['glasses'=>$glasses])->render();
    }

    public function eyeglasses()
    {
        $glasses = Glass::where('glass_type','=','eyeglass')->paginate(15);
        // $allcolors=Glass::where("glass_code",$glass->glass_code)->get('color_id');
        // $colors=Color::whereIn("id",$allcolors)->get('name');
        return view('glass.eyeglass', compact('glasses'));
    }

    public function sort(Request $request)
    {
        
        $option = $request->get('option');
        $type = $request->get('type');

        // $all_glasses = Glass::all();
        if($type == 'sun'){
            if($option == 'low'){
                dd('mmm');
                $sorted=Glass::where('glass_type','=','sunglass')->get()->sortBy('price_after_discount')->toArray();
                
            }
            else{
                dd('mmm');
                $sorted=Glass::where('glass_type','=','sunglass')->get()->sortByDesc('price_after_discount')->toArray();
            }
            // return  response()->json(['glasses'=>$sorted,'option'=>$option]);
            return $sorted;

        }
        else{
            if($option == 'low'){
                $sorted=Glass::where('glass_type','=','eyeglass')->get()->sortBy('price_after_discount')->toArray();
            }
            else{
                $sorted=Glass::where('glass_type','=','eyeglass')->get()->sortByDesc('price_after_discount')->toArray();
            }
            return  response()->json(['glasses'=>$sorted,'option'=>$option]);

        }

        // return view('glass.eyeglass', compact('glasses'));

    }



    // public function sort(Request $request)
    // {
    //     // $all_glasses = Glass::all();
    //     if($request->type == 'sun'){
    //         $all_glasses = Glass::where('glass_type','=','sunglass')->get();
    //     }
    //     elseif($request->type == 'eye'){
    //         $all_glasses = Glass::where('glass_type','=','eyeglass')->get();
    //     }
        
    //     if($request->select == 'low'){
    //         $glasses=$all_glasses->sortBy('price_after_discount');
    //     }
    //     elseif($request->select == 'high'){
    //         $glasses=$all_glasses->sortByDesc('price_after_discount');
    //     }
    //     return redirect('sunglasses')->with('glasses', $glasses);
    //     // return view('glass.eyeglass', compact('glasses'));

    //     // return  response()->json(['glasses'=>$glasses]);
    // }

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
