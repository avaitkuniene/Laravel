<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(): View|RedirectResponse
    {
//        if (!Auth::user()) {
//            return redirect(route('login'));
//        }
        return view('users/index', ['user' => Auth::user()]);
    }
}
