<?php

namespace App\Http\Controllers;

use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class login extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validate=request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        if(! Auth::attempt($validate)){

            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]);
        }
        request()->session()->regenerate();
        return redirect('/');

    }
    public function destroy(){

        Auth::logout();

        return redirect('/');
    }
}
