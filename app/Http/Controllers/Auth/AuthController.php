<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new User.
     */
    public function showRegister()
    {
        return View('Auth.registration');
    }

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'role' => 'required|string|in:admin,employee,user',
        ]);
        $user = new User();
        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->password = Hash::make($fields['password']);
        $user->role = $fields['role'];
        $user->save();

        $token = $user->createToken($request->email)->plainTextToken;
        $user->remember_token = $token;
        $user->save();

        Auth::login($user);
        return match ($user->role) {
            'admin' => redirect('/{$roles}/dashboard'),
            'employee' => redirect('/{$roles}/dashboard'),
            'user' => redirect('/{$roles}/dashboard'),
            default => back()->withErrors(['role' => 'Invalid role assigned. Contact the administrator.']),
        };
    }
    /**
     * Show the Login form.
     */
    public function showLogin()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        if (!Auth::attempt($fields)) {
            return back()->withErrors(['email' => 'Invalid User Details']);
        }
        $user = Auth::user();
        // $roles = Auth::check();
        if ($user && Hash::check($fields['password'], $user->password)) {
            return match ($user->role) {
                'admin' => redirect('/dashboard'),
                'employee' => redirect('/dashboard'),
                'user' => redirect('/dashboard'),
                default => back()->withErrors(['role' => 'Invalid role assigned. Contact the administrator.']),
            };
        }
    }
    /**
     * Show the Logout form.
     */
    public function logout(Request $request)
    {
        // Revoke the current token
        if ($request->user() && $request->user()->currentAccessToken()) {
            $request->user()->currentAccessToken()->delete();
        }
        // Invalidate the session
        $request->session()->invalidate();
        // Regenerate CSRF token
        $request->session()->regenerateToken();
        // Redirect to the login page
        return redirect('/');
    }
}