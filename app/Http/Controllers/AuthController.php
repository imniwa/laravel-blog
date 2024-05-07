<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        switch ($request->method()) {
            case 'GET':
                if (Auth::check()){
                    return redirect()->route('post');
                }
                return view('page.login');
            case 'POST':
                return $this->verifUser($request);
            default:
                abort('404');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function verifUser(Request $request){
        $user = User::where('username', $request->username)->first();
        if (!$user){
            return redirect()->route('login');
        }
        Auth::attempt([
            'email' => $user['email'],
            'password' => $request->password
        ]);
        return redirect()->route('post');
    }
}
