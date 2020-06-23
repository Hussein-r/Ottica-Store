<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use App\Contact_us;
use Redirect;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("About&Contact.contact");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("About&Contact.about");
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
        $data=$this->validate($request,[
            'name' => 'required',
            'email' => 'email|required',
            'subject' => 'required',
            'message'=>'required',
        ]);
        $message= new Contact_us();
        $message->name=$request->name;
        $message->email=$request->email;
        $message->subject=$request->subject;
        $message->message=$request->message;
        $message->save();
        return Redirect::to(URL::previous() . "#whatever")->with('success', 'Your Message Sent We Will Contact You Soon');

    }
    public function adminShow(){
        $messages=Contact_us::all();
        return view('About&Contact.showContact',compact('messages'));
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
        $data=$this->validate($request,[
            'name' => 'required',
            'email' => 'email|required',
            'subject' => 'required',
            'message'=>'required',
        ]);
        $message->name=$request->name;
        $message->email=$request->email;
        $message->subject=$request->subject;
        $message->message=$request->message;
        $message->save();
        return Redirect::back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact_us $message)
    {
        //
        $message->delete();
        return Redirect::back(); 
    }

}
