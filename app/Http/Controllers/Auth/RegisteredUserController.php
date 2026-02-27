<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create(Request $request)
    {
        // Menangkap paket dari URL, jika tidak ada default ke level 1
        $selectedPackage = $request->query('package', 1);
        return view('auth.register', compact('selectedPackage'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'package_level' => ['required', 'in:1,2,3'], 
        ]);

        // LOGIKA SINKRONISASI HARGA:
        // Tentukan harga berdasarkan package_level sebelum simpan ke DB
        $price = 50000; // Default Level 1
        
        if ($request->package_level == 2) {
            $price = 100000; // Contoh harga Level 2
        } elseif ($request->package_level == 3) {
            $price = 150000; // Contoh harga Level 3
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'package_level' => $request->package_level, 
            'package_price' => $price, // SEKARANG HARGA DISIMPAN SESUAI LEVEL
            'is_active' => false, 
        ]);

        return redirect()->route('register.pending', ['user' => $user->id]);
    }
}