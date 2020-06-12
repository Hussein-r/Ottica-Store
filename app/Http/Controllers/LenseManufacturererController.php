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
        return view('LenseManufacturerer.create',['manufacturerers' => $manufacturerers]);
    }

    public function store(Request $request)
    {
        $data=$this->validate($request,['name' => 'required|unique:lense_manufacturerers']);
        $manufacturerer=new LenseManufacturerer();
        $manufacturerer->name=$request->name;
       
        $manufacturerer->save();
        return redirect()->action("LenseManufacturererController@create");   
    }
   
    
    
   }
