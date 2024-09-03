<?php
namespace App\Http\Middleware;
use App\Enums\Rolse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
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
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }
        if (!auth()->user()->hasRole(Rolse::ADMIN)) {
            return redirect()->route('home')->with('error', 'You do not have admin access.');
        }
        return $next($request);
    }
}



