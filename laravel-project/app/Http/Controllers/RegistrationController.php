<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registration\StoreRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function show(): View
    {
        return view('registration/register');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->all();

        $hashed = Hash::make($data['password']);

        if (Hash::check($data['password_confirmation'], $hashed)) {
            $user = User::create(
                [   'name' => $data['name'],
                    'email' => $data['email'],
                    'role' => $data['role'],
                    'password' => $hashed,
                    'email_verified_at' => new \DateTime()
                ]
            );

            auth()->login($user);

            return redirect()->to('/');

        } else {

            return back()->withErrors(['password' => 'Password is not matching']);
        }
    }
}
