<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(auth()->user()->role);
        // if((int)auth()->user()->role !== User::ROLE_ADMIN){
        //     abort(403);
        // }

        // if (! $request->user() || $request->user()->name !== 'George') {
        //     return redirect('/');
        // }

        if(!auth()->user()->role->is_admin()){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
