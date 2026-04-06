<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Auth\GenericUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('public.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ]);

        // This is a placeholder login workflow.
        // In a real app, you would validate credentials against the database.
        $role = Str::contains($request->input('email'), 'admin') ? 'admin' : 'customer';

        $userData = [
            'id' => 1,
            'name' => $role === 'admin' ? 'Admin User' : 'Customer User',
            'email' => $request->input('email'),
            'role' => $role,
        ];

        Auth::setUser(new GenericUser($userData));
        $request->session()->put('app_user', $userData);

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    }

    public function showRegister()
    {
        return view('public.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:4|confirmed',
        ]);

        // This is a placeholder registration workflow.
        // In a real app, you would create a user record in the database.
        $userData = [
            'id' => 2,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 'customer',
        ];

        Auth::setUser(new GenericUser($userData));
        $request->session()->put('app_user', $userData);

        return redirect()->route('user.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('app_user');

        return redirect()->route('public.home');
    }
}
