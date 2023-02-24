<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function register()
    {

        return view('admin.register');
    }
    public function authenticate(Request $request)
    {
        $cradentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($cradentials)){

            if(Auth::user()->status != 'active'){
                Auth::logout();
                $request->session()->invalidate();
                $request->session->regenerateToken();

                Session::flash('status','failed');
               Session::flash('message','Your account is not active yet, please contact admin!');
                return redirect('/login');
            }
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        Session::flash('status','failed');
        Session::flash('message','Login Gagal');
        return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'phone'    => 'required|max:255',
            'address'   => 'required',
        ]);
        $request['password'] =  Hash::make($request->newPassword);
        $user = Users::create($request->all());
          
        Session::flash('status','success');
        Session::flash('message','Registrasi Berhasil');
        return redirect('register');
    }

}