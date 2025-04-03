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
    public function handle(Request $request, Closure $next, $role): Response
    {
        /**
         * check token
         */
        $token = $request->cookie('token') ?? $request->query('token');

        if ($token) {
            $user = User::where('remember_token', $token)->first();

            if (!session()->has('logged_in')) {
                return redirect('/login')->with('error', 'Please log in first.');

                if ($user) {
                    Auth::login($user);
                    if (!Auth::check() || Auth::user()->role !== $role) {
                        return redirect('register')->with('error', 'First Register Your Role by Email');
                    }
                }
            }
        }
        return $next($request);
    }
}
