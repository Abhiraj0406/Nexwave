<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function showHome()
    {
        return View('pages.home');
    }

    public function showDashboard()
    {
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'employee', 'user'])) {
            return view('dashboard');
        } else {
            return redirect('/login');
        }
    }

    public function showProfile()
    {
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'employee', 'user'])) {
            return view('pages.profile');
        } else {
            return redirect('/login');
        }
    }

    public function showEmployee()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('pages.employee');
        } else {
            return redirect('/logout');
        }
    }

    public function showUser()
    {
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'employee'])) {
            return view('pages.user');
        } else {
            return redirect('/logout');
        }
    }

    public function showSite()
    {
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'employee', 'user'])) {
            return view('pages.site');
        } else {
            return redirect('/login');
        }
    }

    public function showReadout()
    {
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'employee', 'user'])) {
            return view('pages.readout');
        } else {
            return redirect('/login');
        }
    }
}
