<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()
            ->withErrors([
                'email' => 'This email is not registered.',
            ])
            ->withInput();
    }

    if (!Hash::check($request->password, $user->password)) {
        return back()
            ->withErrors([
                'password' => 'Incorrect password.',
            ])
            ->withInput();
    }

    Auth::login($user);

    $request->session()->regenerate();

    $request->session()->put('user_id', $user->id);
    $request->session()->put('user_name', $user->name);
    $request->session()->put('user_email', $user->email);
    $request->session()->put('user_role', $user->role);

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');
}

    public function showRegister()
    {
        return view('public.auth.register');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->forget([
        'user_id',
        'user_name',
        'user_email',
        'user_role',
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('public.home');
    }

    public function register(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'customer',
            ]);

                Auth::login($user);
                  //session
                  $request->session()->regenerate();

                  session()->put('app_user', [
                 'id' => $user->id,
                 'name' => $user->name,
                 'email' => $user->email,
                 'role' => $user->role,
            ]);


                $request->session()->put('user_id', $user->id);
                $request->session()->put('user_name', $user->name);
                $request->session()->put('user_email', $user->email);
                $request->session()->put('user_role', $user->role);

                
                return redirect()->route('user.dashboard');
}
}