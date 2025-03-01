<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()){
            if(!auth()->user()->is_admin) {
                return redirect()->route('admin.login')->with('error', 'Dont have permission!');
            }
        } else {
            return redirect()->route('admin.login')->with('error', 'Dont have permission!');
        }
        
        return $next($request);
    }
}
