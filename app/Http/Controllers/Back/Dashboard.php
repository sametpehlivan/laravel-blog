<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use \App\Models;
class Dashboard extends Controller
{
    //
    public function index()
    {
        return view('back.dashboard');
    }
    public function loginget()
    {
        return view('back.layouts.login');
    }
    public function loginpost(Request $request)
    {


        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(Auth::attempt(['password'=>$request->password,'email'=>$request->email])) return redirect()->route('admin.dashboard');


        else  return back()->withErrors(['Şifre ve Email bilgilerinizi kontrol edin!'])->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login.get');
    }
}
