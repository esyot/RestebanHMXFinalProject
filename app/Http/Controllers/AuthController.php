<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
{
    try {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return view('dashboard');
        }
    } catch (\Exception $e) {
        $errorMessages = [
            'email' => '',
            'password' => '',
        ];

        if ($e instanceof \Illuminate\Validation\ValidationException) {
            $errors = $e->validator->errors();

            if ($errors->has('email')) {
                $errorMessages['email'] = '<div class="italic text-left text-red-500 text-sm">' . $errors->first('email') . '</div>';
                
                return view('errors.email-error', [
                    'emailError' => $errorMessages['email'],
                   
                ]);
           
            }

            if ($errors->has('password')) {
                $errorMessages['password'] = '<div class="italic text-left text-red-500 text-sm">' . $errors->first('password') . '</div>';
                
                return view('errors.password-error', [
                    'passwordError' => $errorMessages['password'],
                   
                ]);
            
            } 
            

          

        } elseif ($e instanceof \Exception) {
            return view('partials.login-error')->with('errorMessage', $e->getMessage());
        }

        return view('partials.login-error');
    }
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
