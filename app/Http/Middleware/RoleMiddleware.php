<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$roles): Response
    {
        // dd('RoleMiddleware is applied!');

        /**
         * check token
         */
        $token = $request->cookie('token') ?? $request->query('token');

        if($token) {
            $user = User::where('remember_token', $token)->first();

            if($user) {
                Auth::login($user);

                if(!Auth::check() || Auth::user()->role !== $roles) {
                    return redirect('register')->with('error','First Register Your Role by Email');
                }
            }
        }
        return $next($request);
    }
}
