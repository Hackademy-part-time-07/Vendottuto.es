<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsRevisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_revisor){
            return $next($request);
        }else{
            return redirect()->route('home')->withMessage(['type'=> 'danger', 'text'=> 'Acceso denegado, no eres un revisor, pregunta al administrador']);
        }
        
    }
}
