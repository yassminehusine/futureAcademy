<?php
namespace App\Http\Middleware;

use App\Enums\Rolse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Doctors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ensure the user is logged in
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        // Check if the user is either an Admin or Doctor
        if (!auth()->user()->hasRole(Rolse::DOCTORS)&&!auth()->user()->hasRole(Rolse::ADMIN)){
            return redirect()->route('home')->with('error', 'You do not have access to this page.');
        }
        return $next($request);
    }
}





