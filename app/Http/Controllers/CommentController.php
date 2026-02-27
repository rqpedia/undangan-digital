<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Invitation;

class CommentController extends Controller
{
    public function store(Request $request, $slug)
    {
        // 1. Validasi (tambahkan presence agar tidak hilang)
        $request->validate([
            'name' => 'required|string|max:100',
            'message' => 'required|string',
            'presence' => 'required|string', // Pastikan presence divalidasi
        ]);

        // 2. Cari ID undangan berdasarkan slug
        $invitation = Invitation::where('slug', $slug)->first();

        if (!$invitation) {
            return response()->json(['message' => 'Undangan tidak ditemukan'], 404);
        }

        // 3. Simpan ke database
        $comment = Comment::create([
            'invitation_id' => $invitation->id,
            'name' => $request->name,
            'message' => $request->message,
            'presence' => $request->presence, // Simpan status kehadiran
        ]);

        // 4. Kirim respon balik ke JavaScript (AJAX)
        return response()->json([
            'status' => 'success',
            'message' => 'Ucapan berhasil dikirim!',
            'data' => $comment
        ], 200);
    }
}