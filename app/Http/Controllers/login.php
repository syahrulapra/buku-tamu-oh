<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;

class login extends Controller
{
    public function index()
    {
        if (Auth::check()) 
        {
            return redirect('/list');
        }
        else
        {
            return view('login');
        }
    }

    public function loginaksi(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) 
        {
            return redirect('list');
        }
        else
        {
            FacadesSession::flash('error', 'Username atau Password Salah');
            return redirect('/login');
        }
    }

    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/');
    }
}
