<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // Authentication successful
                $user = Auth::user();
                $token = $user->createToken('AuthToken')->accessToken;

                return response()->json([
                    'token' => $token,
                    'user' => $user,
                ], 200);
            } else {
                // Authentication failed
                throw ValidationException::withMessages([
                    'email' => ['Invalid credentials'],
                ]);
            }
        } catch (ValidationException $e) {
            // Validation exception, return error response
            return response()->json(['error' => $e->errors()], 401);
        } catch (\Exception $e) {
            // Other exceptions, return generic error response
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}
