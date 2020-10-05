<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store()
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required'

        ]);
        Auth::attempt(request()->only('email','password'), request('remember'));
        return redirect()->intended('/');
    }
}
