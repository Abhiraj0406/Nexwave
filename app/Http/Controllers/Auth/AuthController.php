<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showDashboard()
    {
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'employee', 'user'])) {
            return view('dashboard');
        }
        return redirect('/login');
    }

    public function showRegister()
    {
        return view('Auth.registration');
    }

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'role' => 'required|string|in:admin,employee,user',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
            'role' => $fields['role'],
            'remember_token' => bin2hex(random_bytes(16)), // Generate token
        ]);

        Auth::login($user);
        return redirect("/{$user->role}/dashboard");
    }

    public function showLogin()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $fields['email'], 'password' => $fields['password']])) {
            $user = Auth::user();
            return redirect("/{$user->role}/dashboard");
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
}
