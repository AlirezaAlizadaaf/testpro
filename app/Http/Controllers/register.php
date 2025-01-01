<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\password;

class register extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        request()->validate([
            'name'=>['required' , 'min:3'],
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
        ]);
        $user= User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
