<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=User::where("id","=",Auth::id())->firstOrFail();
        $userRoles = $user->roles->pluck('name');
        if($userRoles->contains('Admin')){
            return redirect('/dashboard');
        }else{
            return redirect('/');
        }
    }
}
