<?php

namespace App\Http\Controllers;

use App\Http\Requests\Passwords\ChangeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function show()
    {
        return view('users/show');
    }

    public function store(ChangeRequest $request)
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

        return redirect()->back()->with('message', 'Password updated successfully!');
    }
}
