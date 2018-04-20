<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name'     => 'required',
            'email'    => 'email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect()->home();
    }
}
