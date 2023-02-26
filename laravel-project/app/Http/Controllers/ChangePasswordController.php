<?php

namespace App\Http\Controllers;

use App\Http\Requests\Passwords\ChangeRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function show(): View
    {
        return view('users/index');
    }

    public function store(ChangeRequest $request): RedirectResponse
    {
        $data = $request->all();

        if(!Hash::check($data['old_password'], Auth::user()->getAuthPassword())){
            return back()->with("error", "Old Password Doesn't match!");
        }

        $hashed = Hash::make($data['password']);

        if (Hash::check($data['password_confirmation'], $hashed)) {
            $user = Auth::user();
            $user->password = $hashed;
            $user->save();
        }

        return redirect()->back()->with('success', 'Password updated successfully!');
    }
}
