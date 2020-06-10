<?php

namespace App\Http\Controllers;
use App\SpecialOffers;
use Illuminate\Http\Request;

class SpecialOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $specialOffers = SpecialOffers::List()->get();
        // dd($specialOffers);
        return view('specialOffers.listSpecialOffers',['specialOffers' => $specialOffers]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('specialOffers.addSpecialOffers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $specialOffer = new SpecialOffers();
        $specialOffer->discount = $request->discount;
        $specialOffer->description = $request->description;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $specialOffer->image=$imageName;
        }
        $specialOffer->save();
        return redirect()->action('specialOffersController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $offer = SpecialOffers::find($id);
        return view('specialOffers.editSpecialOffers',['offer' => $offer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        // dd($id);
        // dd($request);
        
        // dd($offer);
        $data=$this->validate($request,[
            'discount'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        if ($request->hasFile('image')) {
            $offer = SpecialOffers::find($id);
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $offer->discount = $request->discount;
            $offer->description = $request->description;
            $offer->image = $imageName;
            $offer->save();
        }
        return redirect()->action('specialOffersController@index');
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
        $offer = SpecialOffers::find($id);
        if ($offer !=null ){
            $offer->delete();
        }
        
            return redirect()->action(
                'specialOffersController@index');
    }
}
