<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\User;

class SiteController extends Controller
{
    public function showCreatesite()
    {
        $users = User::where('role', 'user')->get();

        return view('sites.createSite', compact('users'));
    }

    public function createSite(Request $request)
    {
        $fields = $request->validate([
            'site_name' => 'required|string|max:255|unique:sites,site_name',
            'user_id' => 'required|exists:users,id',
        ]);

        /**
         * only admin or employee can create
         */
        if (!in_array(Auth::user()->role, ['admin', 'employee'])) {
            abort(403, 'login');
        }

        $site = new Site();
        $site->site_name = $fields['site_name'];
        $site->user_id = $fields['user_id'];
        $site->save();

        return redirect('site')->with('success', 'Site created for user successfully.');
    }

    public function siteDetails(Request $request)
    {
        $authUser = Auth::user();
        $users = ($authUser->role === 'user')
            ? collect([$authUser])
            : User::where('role', 'user')->get();

        $selectedUser = $request->get('user_id') ?? ($authUser->role === 'user' ? $authUser->id : null);

        $sites = $selectedUser ? Site::where('user_id', $selectedUser)->get() : collect();

        return view('pages.site', compact('users', 'sites', 'selectedUser', 'authUser'));
    }
}
