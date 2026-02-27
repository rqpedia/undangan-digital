<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    /**
     * Menampilkan katalog tema untuk User
     */
    public function index()
    {
        // Ambil semua tema yang aktif, urutkan dari level terendah
        $themes = Theme::where('is_active', true)
            ->orderBy('level', 'asc')
            ->get();

        return view('user.themes.index', compact('themes'));
    }

    /**
     * Proses pemilihan tema oleh User
     */
    public function selectTheme(Request $request)
    {
        $request->validate([
            'theme_id' => 'required|exists:themes,id',
        ]);

        $theme = Theme::findOrFail($request->theme_id);
        $user = Auth::user();

        // --- PROTEKSI BACKEND ---
        // Cek apakah level tema lebih tinggi dari level paket user
        if ($theme->level > $user->package_level) {
            return back()->with('error', 'Waduh! Tema ini terkunci. Silahkan upgrade paket Anda untuk menggunakan desain ' . $theme->name);
        }

        // Pastikan user punya data undangan (invitation)
        if (!$user->invitation) {
            return back()->with('error', 'Silahkan buat data undangan terlebih dahulu.');
        }

        // Update tema di tabel invitations
        $user->invitation->update([
            'theme_id' => $theme->id
        ]);

        return redirect()->route('user.dashboard')
            ->with('success', 'Tema ' . $theme->name . ' berhasil diterapkan pada undangan Anda!');
    }
}