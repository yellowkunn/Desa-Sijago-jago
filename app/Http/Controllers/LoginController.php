<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'name' => ['required', 'string'],
                'password' => ['required', 'string'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            }

            return back()->withErrors([
                'loginError' => 'Username atau password salah.'
            ])->onlyInput('name');
        } catch (\Exception $e) {
            return back()->withErrors([
                'loginError' => 'Terjadi kesalahan sistem. Silakan coba lagi nanti.'
            ]);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login')->with('success', 'Berhasil logout.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat logout. Silakan coba lagi.');
        }
    }
}
