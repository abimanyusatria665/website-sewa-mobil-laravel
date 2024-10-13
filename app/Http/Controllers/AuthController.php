<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $data = $request->validate([
            'name' => "required",
            'phone_number' => "required",
            'email' => "required",
            "password" => "required"
        ]);
        $user = User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            return redirect('/login')->with('success', "Successfully Create Account");
        } else {
            return back()->with('failed', "Failed To Create User");
        }
    }

    public function loginInput(Request $request)
    {
        try {
            $data = $request->validate([
                'email' => 'required|exists:users,email',
                'password' => 'required'
            ], [
                'email.exists' => 'This User Doesnt Exists'
            ]);

            Auth::attempt($data);

            return redirect('/');
        } catch (\Throwable $th) {
            return back()->with('fail', 'Check Your Credential!');
        }
    }
}
