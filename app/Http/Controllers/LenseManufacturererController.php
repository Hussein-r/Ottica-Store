<?php

namespace App\Http\Controllers;
use App\LenseManufacturerer;
use Illuminate\Http\Request;

class LenseManufacturererController extends Controller
{
    //
  

    public function create()
    {
        $manufacturerers=LenseManufacturerer::all();
        return view('lenseManufacturerer.create',['manufacturerers' => $manufacturerers]);
    }

    public function store(Request $request)
    {
        $data=$this->validate($request,['name' => 'required|unique:lense_manufacturerers']);
        $manufacturerer=new LenseManufacturerer();
        $manufacturerer->name=$request->name;
       
        $manufacturerer->save();
        return redirect()->action("LenseManufacturererController@create");   
    }
   
    public function index()
    {
        $manufacturerers = LenseManufacturerer::all();
        return view('lenseBrand/index', ['manufacturerers'=>$manufacturerers])->render();
    }
    
    public function destroy($id)
    {
    //    dd($id);
        $manufacturerer = LenseManufacturerer::find($id);
        // dd($brand);
        if ($manufacturerer != null) {
        $manufacturerer->delete();
    }
    
    return redirect()->action("LenseManufacturererController@index");   
}
    

    public function update(Request $request, $id)
    {
        $manufacturerer = LenseManufacturerer::find($id);
        $manufacturerer->name = $request->name;
        $manufacturerer->save();
        return redirect()->action('LenseManufacturererController@index');
    }

    public function edit($id)
    {
        $manufacturerer = LenseManufacturerer::find($id);
        return view('LenseManufacturerer/edit', ['manufacturerer' =>$manufacturerer])->render();
    }
   }
