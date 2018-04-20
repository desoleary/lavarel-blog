<?php

namespace App\Http\Controllers;

use App\User;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
//        $credentials = request()->only('email', 'password');
//        if (!auth()->attempt($credentials)) {
//            return back();
//        }

        auth()->login(User::first()); // TODO: fix attempt not working.
        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }
}
