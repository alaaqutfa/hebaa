<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            return redirect()->route('auth.get.login')->with('error', 'Sorry, you do not have permission to access.');
        }

        if (Auth::check()) {
            if (Auth::user()->is_admin) {
                return $next($request);
            } else {
                return redirect('/');
            }
        }
    }
}
