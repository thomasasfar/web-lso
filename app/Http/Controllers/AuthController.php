<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if ($request->ajax()) {
            $credentials = $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);

            // cek apakah login valid
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                if (Auth::user()->role == 'admin') {
                    return response()->json(['redirect' => '/barang']); // Redirect admin ke halaman barang
                } else {
                    return response()->json(['redirect' => '/katalog']); // Redirect user ke halaman katalog
                }
            }
            return response()->json(['error' => 'Username atau Password Salah'], 422);
        }
        return abort(404);
    }
}
