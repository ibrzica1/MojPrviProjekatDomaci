<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Symfony\Component\HttpFoundation\Response;

use function Laravel\Prompts\error;

class AdminCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = FacadesAuth::user()->role;
        if($role != 'admin'){
            return redirect("/");
        }
        
        return $next($request);
    }
}
