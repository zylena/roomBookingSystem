<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/';

    public function showResetForm(Request $request, $token = null)
    {
        return view('public.auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }
}