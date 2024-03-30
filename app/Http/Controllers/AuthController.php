<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('admin.sesi.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

         // cek apakah login valid
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return response()->json(['redirect' => '/admin/profil']);
            } else {
                return response()->json(['redirect' => '/admin/klien']);
            }
        }
        return response()->json(['errors' => ['username' => ['Username atau Password Salah']]], 422);
    }
}
