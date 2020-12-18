<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getSignin()
    {
        return view('auth.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required||max:255',
            'password' => 'required|min:6'
        ]);

        if(!Auth::attempt($request->only('email', 'password'), $request->has('remember')))
        {
            return redirect()->back()->with('danger', 'Login or password is incorrect');
        }

        if(Auth::user()->hasAnyRole('admin'))
        {
            return redirect()->route('backend.index')->with('success', 'You are logged in!');
        }

        return redirect()->route('profile.index', Auth::user()->username)->with('success', 'You are logged in!');
    }

    public function getSignup()
    {
        return view('auth.signup');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:20',
            'password' => 'required|min:6'
        ]);

        User::create([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('home.index')->with('success', 'You are registered!');
    }

    public function getLogOut()
    {
        Auth::logout();

        return redirect()->route('home.index');
    }

    // protected function validatedData() 
    // {
    //     return request()->validate([
    //         'email' => 'required|unique:users|email|max:255',
    //         'username' => 'required|unique:users|alpha-dash|max:20',
    //         'password' => 'required|min:6'
    //     ]);
    // }
}
