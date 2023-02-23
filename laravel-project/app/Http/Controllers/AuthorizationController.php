<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorizationController extends Controller
{
    public function show()
    {
        return view('auth/login');
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if (Auth::attempt($data, $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect('profile');
        }

        return back()->withErrors(['email' => 'Invalid data provided']);

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('home');
    }
}
