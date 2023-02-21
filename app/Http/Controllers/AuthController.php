<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function authenticate(Request $request)
    {
        $cradentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($cradentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        Session::flash('status','failed');
        Session::flash('message','login wrong!');
        return redirect('login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}