<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user) {
            if ($user->role->name == 'admin') 
            {
                return redirect()->route('users.payments.admin',['user' => $user->id]);
            } 
            elseif ($user->role->name == 'user') 
            {
                return redirect()->route('users.payments.user',['user' => $user->id]);
            }
        }

        return $next($request);
    }
}
