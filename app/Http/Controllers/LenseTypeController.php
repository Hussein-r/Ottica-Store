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
        $types = LenseType::all();
        return view('lenseType.index', ['types'=>$types])->render();
    }
    public function destroy($id)
    {
    //    dd($id);
        $type = LenseType::find($id);
        // dd($brand);
        if ($type != null) {
        $type->delete();
    }
    
    return redirect()->action("LenseTypeController@index");   
}
    

    public function update(Request $request, $id)
    {
        $type = LenseType::find($id);
        $type->name = $request->name;
        $type->save();
        return redirect()->action('LenseTypeController@index');
    }

    public function edit($id)
    {
        $type = LenseType::find($id);
        return view('LenseType/edit', ['type' =>$type])->render();
    }

}
