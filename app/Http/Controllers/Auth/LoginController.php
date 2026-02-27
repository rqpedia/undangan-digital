<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        // Jika file admin-login.blade.php BELUM ADA, arahkan ke auth.login saja
        if ($request->is('super-admin*')) {
            // Cek apakah file fisik admin-login ada, jika tidak pakai login biasa
            return view()->exists('auth.admin-login') 
                ? view('auth.admin-login') 
                : view('auth.login'); 
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $request->session()->forget('url.intended');

        // --- LOGIN ADMIN ---
        if ($request->is('super-admin*')) {
            if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
                $request->session()->regenerate();
                return redirect('/super-admin/dashboard'); // Paksa ke dashboard admin
            }
            return back()->withInput($request->only('email'))->with('error', 'Kredensial Admin Salah.');
        }

        // --- LOGIN USER ---
        if (Auth::guard('web')->attempt($credentials, $request->filled('remember'))) {
            $user = Auth::guard('web')->user();

            if (!$user->is_active) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('login')->with('error', 'Akun Anda belum aktif.');
            }

            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withInput($request->only('email'))->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Melempar kembali ke route super.login (URL: /super-admin/login)
        return redirect()->route('super.login');
    }
}