<?php

namespace App\Http\Controllers;
use App\User;
use Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    public function mailOne($id)
    {
        $user=User::where("id","=",$id)->firstOrFail();
        $user=$user->email;
        return view('Emails.Email',['user'=>$user]);
    }
    public function mailAll()
    {
        $users_emails = User::all()->except(Auth::id())->pluck('email')->toArray() ;
        $user = implode(',',$users_emails);
        return view('Emails.Email',['user'=>$user]);
    }
    function send(Request $request)
    {
        $this->validate($request, [
        'Subject'=>'required',
        'To'=>'required',
        'Body'=>'required'
        ]);
        $Email = [
            'To'=>$request->To,
            'Subject'=>$request->Subject,
            'Body'=>$request->Body
        ];
        $users = explode(',',$Email['To']);
        Mail::to($users)->send(new ContactMail($Email));
        return back()->with('success', 'Email Sent!');

    }
    
}
