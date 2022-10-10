<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = Auth::user()->role->slug;
        //dd($user);
        if($user == $role)
        {
            return $next($request);
        }
        //return response()->json(['You do not have permission to access for this page.']);
        // return response()->view('401');
        return abort(401, 'UNAUTHORIZED');

    
        //return $next($request);
    }
}
