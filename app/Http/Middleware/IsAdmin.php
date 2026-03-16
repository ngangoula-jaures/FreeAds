<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //on verifie si l'utilisateur connecté est un admin
        if(Auth::check() && Auth::user()->role === 'admin'){
            return $next($request);
        }
        
        return redirect('/index')->with('error', "vous n'etes pas autorisé a voir cette page.");
    }
}
