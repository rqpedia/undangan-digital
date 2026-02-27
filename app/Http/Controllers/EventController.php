<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function store(Request $request, $id)
    {
        // 1. Validasi input array events
        $request->validate([
            'events' => 'required|array',
            'events.*.name' => 'required|string|max:255',
            'events.*.date' => 'required|date',
            'events.*.start' => 'required',
            'events.*.location' => 'required|string|max:255',
        ]);

        // 2. Cari undangan berdasarkan ID
        $invitation = Invitation::findOrFail($id);

        try {
            // 3. Gunakan Transaction agar proses delete & insert menjadi satu kesatuan atomik
            return DB::transaction(function () use ($request, $invitation) {
                
                // Hapus acara lama (Sinkronisasi data)
                $invitation->events()->delete();

                // 4. Simpan data baru
                foreach ($request->events as $data) {
                    $invitation->events()->create([
                        'event_name'      => $data['name'],
                        'date'            => $data['date'],
                        'start_time'      => $data['start'],
                        'end_time'        => $data['end'] ?? null, // Gunakan null jika kosong
                        'location_name'   => $data['location'],
                        'address'         => $data['address'] ?? null,
                        'google_maps_url' => $data['maps_url'] ?? null,
                    ]);
                }

                return back()->with('success', 'Rangkaian acara berhasil diperbarui!');
            });
            
        } catch (\Exception $e) {
            // Jika terjadi error (misal: masalah database)
            return back()->with('error', 'Gagal menyimpan acara: ' . $e->getMessage());
        }
    }
}