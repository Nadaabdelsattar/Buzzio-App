<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Register(){
        return view('Auth.Register');

    }

    public function store(){

        $validated = request()->validate(

            [

                'name' => 'required|min:3|max:40',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:5'

            ]
        );


        User::create(

            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        return redirect()->route('Dashboard')->with('success','The Account created successfully!');

    }


    public function login(){
        return view('Auth.login');

    }

    public function authenticate(){

        $validated = request()->validate(

            [

                'email' => 'required|email',
                'password' => 'required|min:5'

            ]
        );


        if(Auth::attempt($validated)) {

            request()->session()->regenerate();

            return redirect()->route('Dashboard')->with('success', 'Logged in successfully!');

        }

        return redirect()->route('login')->withErrors([
            'email' => 'No matching user found with the provided email or password'
        ]);

    }


    public function logout(){

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success','Logged out successfully!');
    }




}
