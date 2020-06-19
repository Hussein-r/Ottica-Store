<?php

namespace App\Http\Controllers;
use App\LenseType;
use Illuminate\Http\Request;

class LenseTypeController extends Controller
{
    //
    
    public function create()
    {
        $types=LenseType::all();
        return view('lenseType.create',['types' => $types]);
    }

    public function store(Request $request)
    {
        $data=$this->validate($request,['name' => 'required|unique:lense_types']);
        $type=new LenseType();
        $type->name=$request->name;
       
        $type->save();
        return redirect()->action("LenseTypeController@create");   
    }
    public function index()
    {
        $type = LenseType::all();
        return view('lenseType.index', ['type'=>$type])->render();
    }

}
