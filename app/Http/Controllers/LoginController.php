<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function attempt(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email:rfc,dns,filter_unicode', 'min:5', 'max:40', 'exists:users'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt($request->except(['_token']))) {
            return redirect()->intended('/');
        }
        
        return redirect()->back();
    }
    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
