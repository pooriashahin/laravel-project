<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create() {
        return view('user.register');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        $token = $user->createToken('myToken')->plainTextToken;

//        $response =[
//            'user' => $user,
//            'token' => $token
//        ];

        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    public function login() {
        return view('user.login');
    }

    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            auth()->user()->createToken('myToken')->plainTextToken;
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request) {

        auth()->logout();
//        TODO gets error on deleting null even though user has tokens. Needs a fix.
//        auth()->user()->tokens()->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out');
    }
}
