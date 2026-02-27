<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Theme;
use App\Models\Invitation;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class SuperAdminController extends Controller
{
    /**
     * Dashboard Overview
     */
    public function dashboard(Request $request)
    {
        try {
            $month = $request->get('month', now()->month);
            $year = $request->get('year', now()->year);
            $currentDate = Carbon::createFromDate($year, $month, 1);
            
            // Mencari user online (aktivitas 5 menit terakhir)
            $fiveMinutesAgo = now()->subMinutes(5)->getTimestamp();
            $onlineUsersData = User::whereHas('sessions', function($query) use ($fiveMinutesAgo) {
                $query->where('last_activity', '>=', $fiveMinutesAgo);
            })->where('role', 'user')->get();

            // SINKRONISASI REVENUE: Ambil satu order sukses terakhir per user_id
            $totalRevenue = Order::where('status', 'completed')
                ->latest()
                ->get()
                ->unique('user_id')
                ->sum('total_price');

            $stats = [
                'total_revenue'      => $totalRevenue,
                'total_users'        => User::where('role', 'user')->count(),
                'package_a_count'    => User::where('role', 'user')->where('package_level', 1)->count(),
                'package_b_count'    => User::where('role', 'user')->where('package_level', 2)->count(),
                'package_c_count'    => User::where('role', 'user')->where('package_level', 3)->count(),
                'active_invitations' => Invitation::count(),
                
                // Mengambil Data Transaksi sesuai periode
                'recent_orders'      => $this->getOrdersByPeriod($month, $year),

                'current_month'      => $currentDate->translatedFormat('F Y'),
                'prev_month'         => $currentDate->copy()->subMonth()->month,
                'prev_year'          => $currentDate->copy()->subMonth()->year,
                'next_month'         => $currentDate->copy()->addMonth()->month,
                'next_year'          => $currentDate->copy()->addMonth()->year,

                'online_users_count' => $onlineUsersData->count(),
                'online_users_list'  => $onlineUsersData,
                'latest_invitations' => Invitation::with('user')
                                        ->withCount('comments')
                                        ->latest()
                                        ->take(10)
                                        ->get()
            ];

            return view('admin.dashboard', compact('stats'));

        } catch (\Exception $e) {
            Log::error("Dashboard Error: " . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat data dashboard.');
        }
    }

    /**
     * Fetch Transactions via AJAX (Navigasi Bulan)
     */
    public function fetchTransactions(Request $request)
    {
        try {
            $month = $request->query('month', now()->month);
            $year = $request->query('year', now()->year);
            $currentDate = Carbon::createFromDate($year, $month, 1);

            $stats['recent_orders'] = $this->getOrdersByPeriod($month, $year);

            return response()->json([
                'html' => view('admin.partials._transaction_table', compact('stats'))->render(),
                'navigation' => [
                    'current_month' => $currentDate->translatedFormat('F Y'),
                    'prev_month'    => $currentDate->copy()->subMonth()->month,
                    'prev_year'     => $currentDate->copy()->subMonth()->year,
                    'next_month'    => $currentDate->copy()->addMonth()->month,
                    'next_year'     => $currentDate->copy()->addMonth()->year,
                ]
            ]);
        } catch (\Exception $e) {
            Log::error("Fetch Transactions Error: " . $e->getMessage());
            return response()->json(['error' => 'Gagal memuat data transaksi'], 500);
        }
    }

    /**
     * Helper untuk query order (menghindari duplikasi logika)
     */
    private function getOrdersByPeriod($month, $year)
    {
        return Order::whereMonth('created_at', (int)$month)
            ->whereYear('created_at', (int)$year)
            ->select('orders.*')
            ->with('user')
            ->latest()
            ->get()
            ->unique('user_id') 
            ->values();
    }

    /* --- MANAJEMEN USER --- */

    public function users()
    {
        $users = User::where('role', 'user')
                     ->orderBy('is_active', 'asc')
                     ->latest()
                     ->paginate(20);

        return view('admin.users', compact('users'));
    }

    public function validateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $prices = [1 => 50000, 2 => 100000, 3 => 150000];
        $newPackageLevel = $request->input('package_level', $user->package_level);
        $finalPrice = $prices[$newPackageLevel] ?? 50000;

        $user->update([
            'is_active'     => true,
            'package_level' => $newPackageLevel,
            'package_price' => $finalPrice,
        ]);

        Order::updateOrCreate(
            ['user_id' => $user->id], 
            [
                'order_id'      => 'INV-' . strtoupper(Str::random(8)), 
                'customer_name' => $user->name,
                'total_price'   => $finalPrice,
                'status'        => 'completed',
                'created_at'    => now()
            ]
        );
        
        return back()->with('success', "Akun {$user->name} berhasil divalidasi.");
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', "Data user berhasil dihapus.");
    }

    public function resetUserPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->update(['password' => Hash::make($request->password)]);

        return back()->with('success', "Password user {$user->name} berhasil diperbarui.");
    }

    /* --- MANAJEMEN TEMA --- */

    public function themes() 
    { 
        $themes = Theme::latest()->get(); 
        return view('admin.themes', compact('themes')); 
    }

    public function storeTheme(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'view_path' => 'required|string|max:255',
            'price' => 'required|numeric',
            'thumbnail' => 'required|image|max:2048',
        ]);

        $path = $request->file('thumbnail')->store('themes', 'public');

        Theme::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'view_path' => $request->view_path,
            'price' => $request->price,
            'thumbnail' => $path,
            'is_active' => true,
        ]);

        return redirect()->route('super.themes.index')->with('success', 'Tema berhasil ditambahkan!');
    }

    public function updateTheme(Request $request, Theme $theme)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'price']);
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('thumbnail')) {
            if ($theme->thumbnail) Storage::disk('public')->delete($theme->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('themes', 'public');
        }

        $theme->update($data);
        return redirect()->route('super.themes.index')->with('success', 'Tema berhasil diperbarui!');
    }

    public function destroyTheme(Theme $theme)
    {
        if ($theme->thumbnail) Storage::disk('public')->delete($theme->thumbnail);
        $theme->delete();
        return redirect()->route('super.themes.index')->with('success', 'Tema berhasil dihapus');
    }

    /* --- AUTH & SETTINGS --- */

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Berhasil keluar sistem.');
    }

    public function settings()
    {
        // Mengambil semua setting dan merubahnya menjadi key => value
        $settings = Setting::pluck('value', 'key');
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        // Ambil semua input kecuali token
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            $finalValue = $value ?? '';

            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $finalValue]
            );
        }

        // Opsional: Hapus cache jika Anda menggunakan cache di AppServiceProvider
        // Cache::forget('site_settings');

        return back()->with('success', 'PENGATURAN BERHASIL DIPERBARUI!');
    }
}