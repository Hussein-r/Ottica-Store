<?php

namespace App\Http\Controllers;
use App\LenseBrand;
use Illuminate\Http\Request;

class LenseBrandController extends Controller
{
    //
    public function create()
    {
        $brands=LenseBrand::all();
        return view('lenseBrand.create',['brands' => $brands]);
    }


    public function store(Request $request)
    {
        $data=$this->validate($request,['name' => 'required|unique:lense_brands', 'image'=>'required']);
        $brand=new LenseBrand();
        $brand->name=$request->name;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $brand->image=$imageName;
        }
        $brand->save();
        return redirect()->action("LenseBrandController@index");   
    }
    public function index()
    {
        $brands = LenseBrand::all();
        return view('lenseBrand/index', ['brands'=>$brands])->render();
    }

    
    public function destroy($id)
    {
    //    dd($id);
        $brand = LenseBrand::find($id);
        // dd($brand);
        if ($brand != null) {
        $brand->delete();
    }
    
        return redirect()->action("LenseBrandController@index");   
    }

    public function update(Request $request, $id)
    {
        $brand = LenseBrand::find($id);
        $brand->name = $request->name;
        if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $brand->image=$imageName;
         }
        $brand->save();
        return redirect()->action('LenseBrandController@index');
    }
    public function edit($id)
    {
        $brand = LenseBrand::find($id);
        return view('LenseBrand/edit', ['brand' =>$brand])->render();
    }
}
