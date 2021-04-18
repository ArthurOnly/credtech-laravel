<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){

        $email = $request['email'];
        $password = $request['password'];

        if (!$email || !$password){
            return '';
        }

        $success = Auth::attempt([
            'email'=> $email,
            'password'=> $password
        ]);

        if ($success){
            return redirect()->route('admin.panel');
        }

        return redirect()->back()->withInput();
    }

    public function signupForm(){
        return view('auth.signup');
    }

    public function signUp(Request $request){
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ];
        
        User::create($data);
        
        return redirect()->route('admin.panel');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.panel');
    }
}
