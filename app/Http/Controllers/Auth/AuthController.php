<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showDashboard()
    {
        // return response()->json(User::latest()->get());
        if (Auth::check('admin || employee || user')) {
            return view('dashboard.dashboard');
        } else {
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
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

        // return response([
        //     'token' => $token,
        // ]);
        Auth::login($user);
        $roles = Auth::check() ? Auth::user()->role : null;
        return match ($user->role) {
            'admin' => redirect('/{$roles}/dashboard'),
            'employee' => redirect('/{$roles}/dashboard'),
            'user' => redirect('/{$roles}/dashboard'),
            default => back()->withErrors(['role' => 'Invalid role assigned. Contact the administrator.']),
        };
    }

    /**
     * Show the form for login.
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
                'admin' => redirect('/{$roles}/dashboard'),
                'employee' => redirect('/{$roles}/dashboard'),
                'user' => redirect('/{$roles}/dashboard'),
                default => back()->withErrors(['role' => 'Invalid role assigned. Contact the administrator.']),
            };
        }
    }

    /**
     * Show the form for login.
     */
    public function logout()
    {
        return redirect('login');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}