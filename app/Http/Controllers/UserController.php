<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Favourite;
use App\Glass;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->except(Auth::id());
        return view('Users.AllUsers',['users'=>$users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        return view('Users.profile',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        return view('Users.edit',['user'=>$user]);
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
        $user=User::where("id","=",$id)->firstOrFail();
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'email' => Rule::unique('users')->ignore($user->id),
            'phone' => 'required|numeric|regex:/(01)[0-9]{9}/',
            'phone' => Rule::unique('users')->ignore($user->id),
            'address' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->address = request('address');
        $user->password = Hash::make(request('password'));
        $user->save();

        return redirect()->route('user.show', ['user' => $user]); 
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
    }
    

    public function myFavourite()
    {
        $glasses = Favourite::all()->where('user_id','=',Auth::id());
        // dd($glasses);
        // $glasses = Glass::where('id','=',$fav->glass_id);
        // return view('Users\favourite', compact('glasses'));
        return view('Users\favourite',['glasses'=>$glasses])->render();
        
    }

    

}
