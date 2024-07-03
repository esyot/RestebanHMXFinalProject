<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            // Attempt to authenticate the user
            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                // If authentication is successful, return the dashboard view
                return view('dashboard');
            }

            // If authentication fails, return an error view
            return view('login-error');
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Login error: ' . $e->getMessage());

            // Return a generic error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
